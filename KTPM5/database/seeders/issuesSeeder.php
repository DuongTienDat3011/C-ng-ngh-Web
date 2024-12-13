<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class issuesSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 100) as $index) { // Tạo 100 vấn đề
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 50), // Tham chiếu tới computers (1-50)
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeThisYear, // Thời gian trong năm nay
                'description' => $faker->text(200), // Mô tả chi tiết
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}