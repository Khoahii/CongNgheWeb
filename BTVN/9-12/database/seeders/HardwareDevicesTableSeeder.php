<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardwareDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hardware_devices')->insert([
            [
                'device_name' => 'Logitech G502',
                'type' => 'Mouse',
                'status' => true,
                'center_id' => 1, // Trung tâm ABC
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_name' => 'Razer BlackWidow',
                'type' => 'Keyboard',
                'status' => true,
                'center_id' => 1, // Trung tâm ABC
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_name' => 'HyperX Cloud II',
                'type' => 'Headset',
                'status' => false,
                'center_id' => 2, // Trung tâm XYZ
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
