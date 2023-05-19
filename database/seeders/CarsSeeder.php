<?php

namespace Database\Seeders;

use Domain\Trips\Models\Car;
use Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    public function run(): void
    {
        User::query()
            ->each(function (User $user): void {
                Car::factory()
                    ->count(rand(2, 5))
                    ->for($user)
                    ->create();
            });

    }
}
