<?php

namespace Tests\Unit\Resources;

use App\Http\API\Trips\Resources\CarResource;
use Domain\Trips\Models\Car;
use Tests\TestCase;

class CarResourceTest extends TestCase
{
    public function test_car_resource_without_trips()
    {
        /** @var Car $car */
        $car = Car::factory()->make();

        $resource = new CarResource($car);

        $this->assertSame(
            [
                'id' => $car->id,
                'make' => $car->make,
                'model' => $car->model,
                'year' => $car->year,
                'trip_count' => 0.0,
                'trip_miles' => 0.0,
            ],
            $resource->resolve()
        );
    }

    public function test_car_resource_with_trips()
    {
        /** @var Car $car */
        $car = Car::factory()->make();
        $car->setAttribute('trips_count', 3);
        $car->setAttribute('trips_sum_miles', 300);

        $resource = new CarResource($car);

        $this->assertSame(
            [
                'id' => $car->id,
                'make' => $car->make,
                'model' => $car->model,
                'year' => $car->year,
                'trip_count' => 3.0,
                'trip_miles' => 300.0,
            ],
            $resource->resolve()
        );
    }
}
