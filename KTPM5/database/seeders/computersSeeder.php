<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class computersSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 50) as $index) { // Tạo 50 máy tính
            DB::table('computers')->insert([
                'computer_name' => 'Lab-' . $faker->regexify('[A-Z]{2}[0-9]{3}'), // VD: Lab-PC05
                'model' => $faker->word . ' ' . $faker->numberBetween(1000, 9999),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Ubuntu 22.04', 'macOS Monterey']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'AMD Ryzen 5 5600X', 'Intel Core i7-10700']),
                'memory' => $faker->randomElement([8, 16, 32, 64]), // RAM
                'available' => $faker->boolean, // Trạng thái hoạt động
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}