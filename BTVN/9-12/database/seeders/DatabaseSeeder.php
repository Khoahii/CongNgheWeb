<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //-bai 1
            LibrariesTableSeeder::class,
            BooksTableSeeder::class,

            //-bai2
            RentersTableSeeder::class,
            LaptopsTableSeeder::class,

            //-bai3
            ItCentersTableSeeder::class,
            HardwareDevicesTableSeeder::class,

            //-bai4
            MovieSeeder::class,
            CinemaSeeder::class
        ]);
    }
}
