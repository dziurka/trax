<?php

namespace Database\Factories;

use Domain\Trips\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Trip>
 */
class TripFactory extends Factory
{
    protected $model = Trip::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'miles' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
