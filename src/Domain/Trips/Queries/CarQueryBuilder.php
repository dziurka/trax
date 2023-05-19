<?php

declare(strict_types=1);

namespace Domain\Trips\Queries;

use Domain\Trips\Data\CreateCarData;
use Domain\Trips\Models\Car;
use Illuminate\Database\Eloquent\Builder;

class CarQueryBuilder extends Builder
{
    public function show(int $carId): static
    {
        return $this->withCount('trips')
            ->withSum('trips', 'miles')
            ->where('id', $carId);
    }

    public function store(CreateCarData $data): Car
    {
        /** @var Car $car */
        $car = $this->create([
            'user_id' => $data->user->getKey(),
            'make' => $data->make,
            'model' => $data->model,
            'year' => $data->year,
        ]);

        return $car;
    }
}
