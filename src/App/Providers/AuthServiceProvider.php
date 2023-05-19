<?php

namespace App\Providers;

use Domain\Trips\Models\Car;
use Domain\Trips\Models\Trip;
use Domain\Trips\Policies\CarPolicy;
use Domain\Trips\Policies\TripPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Car::class => CarPolicy::class,
        Trip::class => TripPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
