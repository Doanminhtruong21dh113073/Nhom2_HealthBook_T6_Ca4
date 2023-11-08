<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dữ liệu seed cho bảng 'users'
        $users = [
            [
                'name' => 'User 1',
                'email' => 'user1@example.com',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'address' => '123 Main St',
                'phone' => '123-456-7890',
                'images' => 'user1.jpg',
                'status' => 'active',
                'role' => 'doctor',
                'gender' => 'men',
           
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@example.com',
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'address' => '456 Elm St',
                'phone' => '987-654-3210',
                'images' => 'user2.jpg',
                'status' => 'active',
                'role' => 'doctor',
                'gender' => 'woman',
                'password' => bcrypt('password456'),
            ],
        ];

        // Chèn dữ liệu seed vào bảng 'users' và lấy ID của mỗi người dùng
        $userIds = [];
        foreach ($users as $userData) {
            $userIds[] = DB::table('users')->insertGetId($userData);
        }
    }
}
