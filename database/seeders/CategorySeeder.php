<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category_name' => 'Khoa Sản', 'description' => 'Chuyên cung cấp các dịch vụ cho sản phụ'],
            ['category_name' => 'Khoa Cấp Cứu', 'description' => 'Chuyên cung cấp các dịch vụ cho cấp cứu'],
            ['category_name' => 'Khoa Nhi', 'description' => 'Chuyên cung cấp các dịch vụ cho trẻ em'],
        ]);
    }
}
