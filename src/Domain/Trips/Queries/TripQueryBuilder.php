<?php

declare(strict_types=1);

namespace Domain\Trips\Queries;

use Carbon\Carbon;
use Domain\Trips\Data\CreateTripData;
use Domain\Trips\Models\Trip;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TripQueryBuilder extends Builder
{
    private const CHUNK_SIZE = 100;

    /**
     * @return Collection<array-key, object>
     */
    public function getRawIndex(User $user): Collection
    {
        return DB::table('trips')
            ->join('cars', 'trips.car_id', '=', 'cars.id')
            ->select([
                'trips.*',
                'cars.*',
                'cars.id AS car_id',
                'trips.id AS trip_id',
                DB::raw('SUM(miles) OVER(PARTITION BY cars.id) AS total_miles'),
            ])
            ->where('trips.user_id', '=', $user->id)
            ->orderByDesc('trips.id')
            ->chunkMap(function (object $trips): object {
                return (object) [
                    'id' => $trips->trip_id,
                    'date' => Carbon::parse($trips->date),
                    'miles' => $trips->miles,
                    'total' => $trips->total_miles,
                    'car' => (object) [
                        'id' => $trips->car_id,
                        'make' => $trips->make,
                        'model' => $trips->model,
                        'year' => $trips->year,
                    ],
                ];
            }, self::CHUNK_SIZE);
    }

    public function store(CreateTripData $data): Trip
    {
        /** @var Trip $trip */
        $trip = $this->create([
            'user_id' => $data->user->getKey(),
            'car_id' => $data->car->getKey(),
            'date' => $data->date,
            'miles' => $data->miles,
        ]);

        return $trip;
    }
}
