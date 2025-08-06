<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CodingLibs\ZktecoPhp\Libs\ZKTeco;
use Illuminate\Support\Carbon;
use App\Models\Attendance;
use Spatie\Permission\Models\Permission;
use App\Models\Branch;
use App\Models\Department;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function index () {
        $branches = Branch::whereRaw('`flags` & ? = ?', [Branch::FLAG_ACTIVE, Branch::FLAG_ACTIVE])->orderBy('id', 'desc')->get();
        $departments = Department::whereRaw('`flags` & ? = ?', [Department::FLAG_ACTIVE, Department::FLAG_ACTIVE])->orderBy('id', 'desc')->get();
        // Fetch all permissions and group by module (prefix)
        $permissions = Permission::all();

        $groupedPermissions = [];

        foreach ($permissions as $permission) {
            // Split by dot
            [$action, $module] = explode('.', $permission->name);
            // Group by module
            $groupedPermissions[$module][$action] = $permission->name;
        }
        $groupedPermissions;

        return view('admin.employees.index', compact('branches', 'departments', 'groupedPermissions'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'username' => 'nullable|string|unique:users,username',
            'password' => 'required|string|min:6',
            'permissions' => 'array',
            'permissions.*' => 'string|exists:permissions,name',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'branch_id' => 'nullable|exists:branches,id',
            'department_id' => 'nullable|exists:departments,id',
            'joining_date' => 'nullable|date',
          
          
        ]);

        DB::beginTransaction();

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->branch_id = $request->branch_id;
            $user->department_id = $request->department_id;
            $user->description = $request->description;
            $user->joining_date = $request->joining_date;
            $user->addFlag(User::FLAG_ACTIVE);

            // Handle role assignment
            if (auth()->user()->hasRole('admin')) {
                $roleName = $request->role;
                $user->role = $roleName;

                // Check if role exists, otherwise create it
                $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
                $role->syncPermissions($request->permissions);
                $user->assignRole($roleName);
            } else {
                $user->designation = $request->designation;

                // Assign default "employee" role if not already exists
               $role = Role::firstOrCreate(['name' => 'employee', 'guard_name' => 'web']);
               $role->syncPermissions($request->permissions); 
               $user->assignRole('employee');
            }

            // Save the user first to get their ID
            $user->save();

            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                $profile = $request->file('profile_picture');
                $filename = rand(99, 9999999) . '.' . $profile->getClientOriginalExtension();
                $profile->storeAs("public/users/profile_pictures/{$user->id}/", $filename);
                $user->profile_picture = $filename;
                $user->save();
            }

            // Assign permissions if provided
            if ($request->has('permissions')) {
                $user->syncPermissions($request->permissions);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Employee created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating user: '.$e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong: '.$e->getMessage());
        }
    }

   

}
