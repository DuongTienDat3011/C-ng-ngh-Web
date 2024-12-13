<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class studentsSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 100) as $index) { // Tạo 100 học sinh
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '-5 years'), // Trẻ em dưới 5 tuổi
                'parent_phone' => $faker->numerify('##########'), // 10 chữ số
                'class_id' => $faker->numberBetween(1, 10), // Tham chiếu tới classes (1-10)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}