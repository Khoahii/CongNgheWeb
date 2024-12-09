<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    public function run()
    {
        DB::table('movies')->insert([
            [
                'title' => 'Avengers: Endgame',
                'director' => 'Anthony và Joe Russo',
                'release_date' => '2019-04-26',
                'duration' => 181,
                'cinema_id' => 1, // ID của rạp CGV Vincom
            ],
            [
                'title' => 'Spider-Man: No Way Home',
                'director' => 'Jon Watts',
                'release_date' => '2021-12-17',
                'duration' => 148,
                'cinema_id' => 2, // ID của rạp Lotte Cinema
            ],
        ]);
    }
}
