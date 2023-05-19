<?php

declare(strict_types=1);

namespace App\Http\API\Trips\Controllers;

use App\Http\API\Trips\Requests\StoreTripRequest;
use App\Http\API\Trips\Resources\TripResource;
use App\Http\Controller;
use Domain\Trips\Data\CreateTripData;
use Domain\Trips\Models\Trip;
use Domain\Users\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Trip::class, 'trip');
    }

    public function index(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        return TripResource::collection(
            Trip::query()->getRawIndex($user)
        )->response();
    }

    public function store(StoreTripRequest $request): TripResource
    {
        $createTripData = CreateTripData::from(
            $request->validated(),
            [
                'user' => $request->user(),
                'car' => $request->car(),
            ],
        );

        return new TripResource(
            Trip::query()->store($createTripData)
        );
    }
}
