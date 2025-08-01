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
        // Define sidebar permissions
        $permissions = [
            'view.dashboard',
            'view.projects',
            'view.tasks',
            'view.chat',
            'view.estimates',
            'view.invoices',
            'view.timesheets',
            'view.employees',
            'view.attendance',
            'view.payroll',
            'view.departments',
            'view.branches',
            'view.leaves',
            'view.recruitment',
            'view.reports',
            'view.settings',
            'view.roles',
            'view.permissions',
            'view.teams',
        ];

        // Create permissions if they don't exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create admin role and assign all sidebar permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions(Permission::whereIn('name', $permissions)->get());

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Change in production
                'email_verified_at' => now(),
                'role' => 'admin',
            ]
        );

        // Assign admin role
        $admin->assignRole($adminRole);
    }
}
