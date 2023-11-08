<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DateOffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {// Dữ liệu seed cho bảng 'date_offs' và liên kết với 'users'
        $dateOffsData = [
            [
                'reason_off' => 'Ngày nghỉ ốm',
                'date_off' => '2023-11-15',
                'start_date' => '2023-11-15',
                'end_date' => '2023-11-15',
                'status' => 'approve',
                'user_id' => 1, // Liên kết với User có ID là 1
            ],
            [
                'reason_off' => 'Ngày nghỉ phép',
                'date_off' => '2023-11-20',
                'start_date' => '2023-11-20',
                'end_date' => '2023-11-21',
                'status' => 'approve',
                'user_id' => 2, // Liên kết với User có ID là 2
            ],
        ];

        // Chèn dữ liệu seed vào bảng 'date_offs' sử dụng Query Builder
        foreach ($dateOffsData as $dateOffData) {
            DB::table('date_offs')->insert($dateOffData);
        }
    }
}
