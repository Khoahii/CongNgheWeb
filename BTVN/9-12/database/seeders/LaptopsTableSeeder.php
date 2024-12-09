<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laptops')->insert([
            [
                'brand' => 'Dell',
                'model' => 'Inspiron 15 3000',
                'specifications' => 'i5, 8GB RAM, 256GB SSD',
                'rental_status' => false,
                'renter_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'HP',
                'model' => 'Pavilion 14',
                'specifications' => 'i7, 16GB RAM, 512GB SSD',
                'rental_status' => true,
                'renter_id' => 1, // Thuê bởi người đầu tiên
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Apple',
                'model' => 'MacBook Air M1',
                'specifications' => 'M1, 8GB RAM, 256GB SSD',
                'rental_status' => true,
                'renter_id' => 2, // Thuê bởi người thứ hai
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
