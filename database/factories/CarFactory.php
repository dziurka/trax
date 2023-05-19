<?php

namespace Database\Factories;

use Domain\Trips\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        return [
            'make' => $this->faker->randomElement([
                'Ford',
                'Chevrolet',
                'Toyota',
                'Honda',
                'Nissan',
                'Jeep',
                'Hyundai',
                'Kia',
                'Dodge',
            ]),
            'model' => Str::ucfirst($this->faker->word()),
            'year' => $this->faker->year,
        ];
    }
}
