<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dữ liệu seed cho bảng 'doctor_categories'
        $doctorCategories = [
            [
                'user_id' => 1, // Thay thế bằng ID của người dùng
                'category_id' => 1, // Thay thế bằng ID của danh mục (category)
            ],
            [
                'user_id' => 1, // Thay thế bằng ID của người dùng
                'category_id' => 2, // Thay thế bằng ID của danh mục (category)
            ],
            [
                'user_id' => 2, // Thay thế bằng ID của người dùng
                'category_id' => 2, // Thay thế bằng ID của danh mục (category)
            ],
        ];

        // Chèn dữ liệu seed vào bảng 'doctor_categories'
        DB::table('doctor_categories')->insert($doctorCategories);
    }
}
