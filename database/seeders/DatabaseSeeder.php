<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'student@example.com'],
            [
                'name' => 'John Student',
                'password' => Hash::make('password'),
                'role' => 'student',
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@example.com'],
            [
                'name' => 'Prof. Smith',
                'password' => Hash::make('password'),
                'role' => 'college_staff',
                'credit_limit' => 1500.00,
                'credit_balance' => 1500.00,
            ]
        );

        User::updateOrCreate(
            ['email' => 'kitchen@example.com'],
            [
                'name' => 'Chef Gordon',
                'password' => Hash::make('password'),
                'role' => 'kitchen_staff',
            ]
        );

        $items = [
            [
                'name' => 'Deluxe Thakali Set',
                    'menu_category' => 'lunch',

                'description' => 'Traditional Nepali thakali meal with rice, dal, vegetables, achar and curry.',
                'price' => 250,
                'photo' => 'static-images/Rectangle 5.png',
                'is_available' => true,
                'is_special' => true,
            ],
            [
                'name' => 'Steamy Chicken Momo',
                    'menu_category' => 'lunch',

                'description' => 'Fresh chicken momo served with spicy tomato achar.',
                'price' => 180,
                'photo' => 'static-images/Rectangle 5.png',
                'is_available' => true,
                'is_special' => true,
            ],
            [
                'name' => 'Spicy Pork Chowmein',
                    'menu_category' => 'lunch',

                'description' => 'Hot and spicy pork chowmein with fresh vegetables.',
                'price' => 200,
                'photo' => 'static-images/Rectangle 5.png',
                'is_available' => true,
                'is_special' => true,
            ],
            [
                'name' => 'Veg Chowmein',
                    'menu_category' => 'lunch',

                'description' => 'Simple and tasty vegetable chowmein.',
                'price' => 120,
                'photo' => 'static-images/Rectangle 5.png',
                'is_available' => true,
                'is_special' => false,
            ],
            [
                'name' => 'Chicken Fried Rice',
                    'menu_category' => 'lunch',

                'description' => 'Fried rice with chicken, egg and vegetables.',
                'price' => 170,
                'photo' => 'static-images/Rectangle 5.png',
                'is_available' => true,
                'is_special' => false,
            ],
            [
                'name' => 'Aloo Paratha',
                    'menu_category' => 'lunch',

                'description' => 'Fresh paratha stuffed with spicy potato filling.',
                'price' => 100,
                'photo' => 'static-images/Rectangle 5.png',
                'is_available' => true,
                'is_special' => false,
            ],
        ];

        foreach ($items as $item) {
            MenuItem::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}