<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        // Tạo 50 bản ghi cho bảng computers
        for ($i = 0; $i < 50; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->company,
                'model' => $faker->word,
                'operating_system' => $faker->randomElement(['Windows', 'Linux', 'macOS']),
                'processor' => $faker->word,
                'memory' => $faker->numberBetween(4, 64),  // RAM từ 4GB đến 64GB
                'available' => $faker->boolean(80), // 80% khả năng máy tính có sẵn
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
