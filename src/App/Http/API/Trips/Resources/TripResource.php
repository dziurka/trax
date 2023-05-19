<?php

namespace App\Http\API\Trips\Resources;

use Domain\Trips\Models\Trip;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /** @var Trip */
    public $resource;

    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'date' => $this->resource->date->toDateString(),
            'miles' => round($this->resource->miles, 2),
            'total' => round($this->resource->total ?? 0, 2),
            'car' => new CarResource($this->resource->car),
        ];
    }
}
