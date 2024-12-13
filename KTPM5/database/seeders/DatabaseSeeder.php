<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            librariesSeeder::class,
            booksSeeder::class,
            rentersSeeder::class,
            laptopsSeeder::class,
            centersSeeder::class,
            hardwaredevicesSeeder::class,
            cinemasSeeder::class,
            moviesSeeder::class,
            medicinesSeeder::class,
            salesSeeder::class,
            classesSeeder::class,
            studentsSeeder::class,
            computersSeeder::class,
            issuesSeeder::class,
        ]);
    }
}
