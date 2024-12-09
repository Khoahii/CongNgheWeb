<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ClassesTableSeeder;  // Import ClassesTableSeeder
use Database\Seeders\StudentsTableSeeder; // Import StudentsTableSeeder

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            ClassesTableSeeder::class,  // Gọi Seeder cho bảng classes
            StudentsTableSeeder::class, // Gọi Seeder cho bảng students
        ]);
    }
}
