<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Giả sử bạn đã có dữ liệu trong bảng `classes`
        $classes = DB::table('classes')->pluck('id');

        foreach (range(1, 10) as $index) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date,
                'parent_phone' => $faker->phoneNumber,
                'class_id' => $faker->randomElement($classes), // Sử dụng id của lớp từ bảng `classes`
            ]);
        }
    }
}
