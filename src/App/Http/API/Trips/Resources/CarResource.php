<?php

declare(strict_types=1);

namespace App\Http\API\Trips\Resources;

use Domain\Trips\Models\Car;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /** @var Car */
    public $resource;

    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'make' => $this->resource->make,
            'model' => $this->resource->model,
            'year' => $this->resource->year,
            'trip_count' => round($this->resource->trips_count ?? 0, 2),
            'trip_miles' => round($this->resource->trips_sum_miles ?? 0, 2),
        ];
    }
}
