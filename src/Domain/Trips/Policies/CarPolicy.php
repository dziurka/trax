<?php

declare(strict_types=1);

namespace Domain\Trips\Policies;

use Domain\Trips\Models\Car;
use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function viewAny(): bool
    {
        return true;
    }

    public function view(User $user, Car $car): bool
    {
        return $user->id === $car->user_id;
    }

    public function delete(User $user, Car $car): bool
    {
        return $user->id === $car->user_id;
    }

    public function create(): bool
    {
        return true;
    }
}
