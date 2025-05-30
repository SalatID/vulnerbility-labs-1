<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $role = Role::firstOrCreate(['name' => 'administrator']);
        $admin->assignRole("administrator");
        $permission = Permission::firstOrCreate(['name' => 'dashboard.view']);
        $role->givePermissionTo($permission);

        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        
        $role = Role::firstOrCreate(['name' => 'general_user']);
        $user->assignRole("general_user");
        $role->givePermissionTo($permission);

        $user = User::firstOrCreate(
            ['email' => 'user2@example.com'],
            [
                'name' => 'Regular User 2',
                'email' => 'user2@example.com',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        $user->assignRole("general_user");

    }
}
