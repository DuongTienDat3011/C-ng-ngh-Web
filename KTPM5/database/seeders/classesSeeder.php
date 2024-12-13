<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class classesSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) { // Tạo 10 bản ghi
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement(['Pre-K', 'Kindergarten']),
                'room_number' => $faker->regexify('[A-Z]{2}[0-9]{2}'), // VD: VH07
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}