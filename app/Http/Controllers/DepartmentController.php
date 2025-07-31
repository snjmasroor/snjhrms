<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    
    public function index() {
        $departments = Department::orderBy('id', 'desc')->get();
        return view('admin.department.index', compact('departments'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|unique:departments,name',
            'head' => 'nullable|string|max:255',
            'employees_under_work' => 'nullable|integer|min:0',
        ]);
         try {
            $department = new Department();
            $department->name = $request->name;
            $department->head = $request->head;
            $department->employees_under_work = $request->employees_under_work ?? 0;
            $department->addFlag(Department::FLAG_ACTIVE);
            $department->save();
        
            return redirect()->back()->with('success', 'Department added successfully.');
         } 
         catch (\Exception $e) {
             return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
