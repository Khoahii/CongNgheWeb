<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('medicines')->insert([
            [
                'name' => 'Paracetamol',
                'branch' => 'Panadol',
                'dosage' => '500mg',
                'form' => 'Tablet',
                'price' => 1.50,
                'stock' => 100,
            ],
            [
                'name' => 'Ibuprofen',
                'branch' => 'Advil',
                'dosage' => '200mg',
                'form' => 'Capsule',
                'price' => 0.75,
                'stock' => 200,
            ]
        ]);
    }
}
