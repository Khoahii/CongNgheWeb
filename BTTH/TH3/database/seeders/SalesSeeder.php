<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SalesSeeder extends Seeder
{
    public function run()
    {
        DB::table('sales')->insert([
            [
                'medicine_id' => 1,  // Đảm bảo giá trị này khớp với 'medicine_id' trong bảng 'medicines'
                'quantity' => 2,
                'sale_date' => now(),
                'customer_phone' => '0123456789',
            ],
            [
                'medicine_id' => 2,  // Đảm bảo giá trị này khớp với 'medicine_id' trong bảng 'medicines'
                'quantity' => 1,
                'sale_date' => now(),
                'customer_phone' => '0987654321',
            ]
        ]);
    }
}

