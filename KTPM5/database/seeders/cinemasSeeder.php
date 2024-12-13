<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class cinemasSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('cinemas')->insert([
                'name' => $faker->company . " Cinema",
                'location' => $faker->address,
                'total_seats' => $faker->numberBetween(50, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}