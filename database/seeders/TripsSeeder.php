<?php

namespace Database\Seeders;

use Domain\Trips\Models\Car;
use Domain\Trips\Models\Trip;
use Illuminate\Database\Seeder;

class TripsSeeder extends Seeder
{
    public function run(): void
    {
        Car::query()
            ->each(
                fn (Car $car) => Trip::factory()
                    ->for($car)
                    ->for($car->user)
                    ->count(rand(2, 10))
                    ->create()
            );
    }
}
