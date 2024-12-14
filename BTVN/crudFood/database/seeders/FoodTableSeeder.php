<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //- tao du lieu
        DB::table('food')->insert([
            [
                'name' => 'Thit xao hanh tay',
                'description' => 'Day la mon best saler ben nha hang Haky',
                'count' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bun ngan',
                'description' => 'Bun ngan a mon an hap dan o cac tinh mien Tay Bac Viet Nam',
                'count' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nom hoa chuoi',
                'description' => 'Nom hoa chuoi la mon an quen thuoc voi moi nguoi dan Ha Tay',
                'count' => 53,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
