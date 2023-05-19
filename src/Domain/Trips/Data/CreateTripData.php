<?php

declare(strict_types=1);

namespace Domain\Trips\Data;

use Domain\Trips\Models\Car;
use Domain\Users\Models\User;
use Spatie\LaravelData\Data;

class CreateTripData extends Data
{
    public function __construct(
        public User $user,
        public Car $car,
        public string $date,
        public string $miles,
    ) {
    }
}
