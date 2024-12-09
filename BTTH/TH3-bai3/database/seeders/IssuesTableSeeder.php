<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    public function run()
    {
        // Dữ liệu mẫu cho bảng issues
        DB::table('issues')->insert([
            [
                'computer_id' => 1,
                'reported_by' => 'John Doe',
                'reported_date' => now(),
                'description' => 'Máy tính bị lỗi màn hình đen',
                'urgency' => 'High',
                'status' => 'Open',
            ],
            [
                'computer_id' => 2,
                'reported_by' => 'Jane Smith',
                'reported_date' => now(),
                'description' => 'Bàn phím không hoạt động',
                'urgency' => 'Medium',
                'status' => 'In Progress',
            ],
        ]);
    }
}
