<?php

use Database\Seeders\CarsSeeder;
use Database\Seeders\TripsSeeder;
use Database\Seeders\UsersSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(CarsSeeder::class);
        $this->call(TripsSeeder::class);
    }
}
