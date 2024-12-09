<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClassesTableSeeder extends Seeder
{
    public function run()
    {
        // Ví dụ dữ liệu mẫu cho bảng classes
        DB::table('classes')->insert([
            ['grade_level' => 'Pre-K', 'room_number' => 'VH7'],
            ['grade_level' => 'Kindergarten', 'room_number' => 'VH8'],
        ]);
    }
}
