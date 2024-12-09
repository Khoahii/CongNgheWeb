<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Gọi các Seeder để chèn dữ liệu
        $this->call([
            ComputersTableSeeder::class,
            IssuesTableSeeder::class,
        ]);
    }
}
