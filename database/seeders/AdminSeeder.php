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
        // Create permissions
        $permissions = [
            'view users', 'create users', 'edit users', 'delete users',
            'manage roles', 'manage permissions',
            'view attendance', 'manage attendance',
            'manage payroll', 'manage departments', 'manage branches',
            'view reports', 'access settings'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create admin role and assign all permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions(Permission::all());

        // Create default admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Change this in production!
                'email_verified_at' => now(),
                'role' => 'admin',
            ]
        );

        // Assign admin role to user
        $admin->assignRole($adminRole);
    }
}
