<?php

namespace Tests\Feature;

use Domain\Users\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

abstract class BaseFeatureTestCase extends TestCase
{
    use LazilyRefreshDatabase;

    protected function actAsUser(User $user): void
    {
        $this->actingAs($user, 'api');
    }
}
