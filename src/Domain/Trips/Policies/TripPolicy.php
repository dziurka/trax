<?php

namespace Domain\Trips\Policies;

use Domain\Trips\Models\Trip;
use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TripPolicy
{
    use HandlesAuthorization;

    public function viewAny(): bool
    {
        return true;
    }

    public function view(User $user, Trip $trip): bool
    {
        return $user->id === $trip->user_id;
    }

    public function create(): bool
    {
        return true;
    }
}
