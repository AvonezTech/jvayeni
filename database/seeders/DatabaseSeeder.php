<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin User
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Create Student User
        \App\Models\User::create([
            'name' => 'John Student',
            'email' => 'student@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);

        // 3. Create College Staff User
        \App\Models\User::create([
            'name' => 'Prof. Smith',
            'email' => 'staff@example.com',
            'password' => bcrypt('password'),
            'role' => 'college_staff',
            'credit_limit' => 1500.00,
            'credit_balance' => 1500.00,
        ]);

        // 4. Create Kitchen Staff User
        \App\Models\User::create([
            'name' => 'Chef Gordon',
            'email' => 'kitchen@example.com',
            'password' => bcrypt('password'),
            'role' => 'kitchen_staff',
        ]);

        // 5. Seed Menu Items
           }
}
