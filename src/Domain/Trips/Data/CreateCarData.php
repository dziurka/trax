<?php

declare(strict_types=1);

namespace Domain\Trips\Data;

use Domain\Users\Models\User;
use Spatie\LaravelData\Data;

class CreateCarData extends Data
{
    public function __construct(
        public User $user,
        public string $make,
        public string $model,
        public int $year,
    ) {
    }
}
