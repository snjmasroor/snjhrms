<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            'dashboard',
            'attendance',
            'absent',
            'ticket',
            'calender',
            'employees',
            'payroll',
            'inventory',
            'settings',
            'departments',
            'branches',
            'leaves',
            'recruitment',
            'reports',
            'roles',
            'permissions',
            'teams',
            'notifications',
            'announcements',
            'payments',
            'users',
        ];
        // Define standard actions
        $actions = ['view', 'create', 'write', 'edit', 'delete', 'import', 'export'];

        // Generate permissions
        $allPermissions = [];

        foreach ($modules as $module) {
            foreach ($actions as $action) {
                $allPermissions[] = "{$action}.{$module}";
            }
        }

        // Create each permission if it doesn't exist
        foreach ($allPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create admin role if not exists
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Assign all permissions to admin
        $adminRole->syncPermissions(Permission::whereIn('name', $allPermissions)->get());

        // Create admin user if not exists
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role' => 'admin',
            ]
        );

        // Assign role to admin
        $admin->assignRole($adminRole);


    }
}
