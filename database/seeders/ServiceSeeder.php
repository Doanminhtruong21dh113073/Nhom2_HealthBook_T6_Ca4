<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Lấy ID của các category từ bảng 'categories'
        $categoryKhoaSan = DB::table('categories')->where('category_name', 'Khoa Sản')->first()->id;
        $categoryKhoaNhi = DB::table('categories')->where('category_name', 'Khoa Nhi')->first()->id;
        $categoryKhoaCapCuu = DB::table('categories')->where('category_name', 'Khoa Cấp Cứu')->first()->id;

        // Dữ liệu seed cho bảng 'services' và liên kết với 'categories'
        $services = [
            [
                'service_name' => 'Dịch vụ A',
                'description' => 'Mô tả cho Dịch vụ A',
                'price' => 100.00,
                'category_id' => $categoryKhoaSan, // Liên kết với category "khoa sản"
            ],
            [
                'service_name' => 'Dịch vụ B',
                'description' => 'Mô tả cho Dịch vụ B',
                'price' => 120.00,
                'category_id' => $categoryKhoaNhi, // Liên kết với category "khoa nhi"
            ],
            [
                'service_name' => 'Dịch vụ C',
                'description' => 'Mô tả cho Dịch vụ C',
                'price' => 150.00,
                'category_id' => $categoryKhoaCapCuu, // Liên kết với category "khoa cấp cứu"
            ],
        ];

        // Chèn dữ liệu seed vào bảng 'services'
        DB::table('services')->insert($services);
    }
}
