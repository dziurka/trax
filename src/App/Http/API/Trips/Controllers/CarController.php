<?php

declare(strict_types=1);

namespace App\Http\API\Trips\Controllers;

use App\Http\API\Trips\Requests\StoreCarRequest;
use App\Http\API\Trips\Resources\CarResource;
use App\Http\Controller;
use Domain\Trips\Data\CreateCarData;
use Domain\Trips\Models\Car;
use Domain\Users\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(Car::class, 'car');
    }

    public function index(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        return CarResource::collection(
            $user->cars()->get()
        )->response();
    }

    public function store(StoreCarRequest $request): CarResource
    {
        $createCarData = CreateCarData::from(
            $request->validated(),
            ['user' => $request->user()]
        );

        return new CarResource(
            Car::query()->store($createCarData)
        );
    }

    public function show(Request $request, Car $car): CarResource
    {
        return new CarResource(
            Car::query()
                ->show($car->getKey())
                ->firstOrFail()
        );
    }

    public function destroy(Request $request, Car $car): JsonResponse
    {
        $car->delete();

        return response()->json([
            'message' => 'Car deleted successfully',
        ]);
    }
}
