<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CinemaSeeder extends Seeder
{
    public function run()
    {
        DB::table('cinemas')->insert([
            [
                'name' => 'CGV Vincom',
                'location' => 'Vincom Center, Hà Nội',
                'total_seats' => 300,
            ],
            [
                'name' => 'Lotte Cinema',
                'location' => 'Lotte Mart, Hà Nội',
                'total_seats' => 250,
            ],
        ]);
    }
}

