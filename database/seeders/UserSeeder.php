<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'HR User',
                'email' => 'hr@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'hr',
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'manager',
            ],
            [
                'name' => 'Employee User',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'employee',
            ],
        ];

        foreach ($users as $data) {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->role = $data['role'];
            $user->save();
        }
    }
}
