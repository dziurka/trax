<?php

declare(strict_types=1);

namespace Tests\Feature\Http;

use Domain\Trips\Models\Car;
use Domain\Users\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\BaseFeatureTestCase;

class CarControllerTest extends BaseFeatureTestCase
{
    use WithFaker;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_can_view_own_cars(): void
    {
        $anotherUser = User::factory()->create();
        Car::factory()
            ->count(2)
            ->for($anotherUser)
            ->create();
        Car::factory([
            'make' => $make = $this->faker->word,
        ])->count(3)
            ->for($this->user)
            ->create();

        $this->actAsUser($this->user);
        $res = $this->getJson(route('cars.index'));

        $res->assertOk();
        $res->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'make',
                    'model',
                    'year',
                ],
            ],
        ]);
        collect($res->json('data.*.make'))->each(
            fn (string $makeItem) => $this->assertSame($make, $makeItem)
        );
        $res->assertJsonCount(3, 'data');
    }

    public function test_can_add_car(): void
    {
        $this->actAsUser($this->user);
        $res = $this->postJson(
            uri: route('cars.store'),
            data: [
                'make' => $make = $this->faker->word,
                'model' => $model = $this->faker->word,
                'year' => $year = $this->faker->year,
            ]
        );

        $res->assertCreated();
        $this->assertDatabaseHas(
            table: new Car(),
            data: [
                'make' => $make,
                'model' => $model,
                'year' => $year,
                'user_id' => $this->user->id,
            ]
        );
    }
}
