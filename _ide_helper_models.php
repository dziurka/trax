<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Domain\Trips\Models{
/**
 * Domain\Trips\Models\Car
 *
 * @property int $id
 * @property int $user_id
 * @property string $make
 * @property string $model
 * @property int $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Domain\Trips\Models\Trip> $trips
 * @property-read int|null $trips_count
 * @property-read \Domain\Users\Models\User $user
 * @method static \Database\Factories\CarFactory factory($count = null, $state = [])
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car newModelQuery()
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car newQuery()
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car query()
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car show(int $carId)
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car store(\Domain\Trips\Data\CreateCarData $data)
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car whereCreatedAt($value)
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car whereId($value)
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car whereMake($value)
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car whereModel($value)
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car whereUpdatedAt($value)
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car whereUserId($value)
 * @method static \Domain\Trips\Queries\CarQueryBuilder|Car whereYear($value)
 * @mixin \Eloquent
 */
	class IdeHelperCar {}
}

namespace Domain\Trips\Models{
/**
 * Domain\Trips\Models\Trip
 *
 * @property int $id
 * @property int $user_id
 * @property int $car_id
 * @property \Illuminate\Support\Carbon $date
 * @property float $miles
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Domain\Trips\Models\Car $car
 * @property-read \Domain\Users\Models\User $user
 * @method static \Database\Factories\TripFactory factory($count = null, $state = [])
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip getRawIndex(\Domain\Users\Models\User $user)
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip newModelQuery()
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip newQuery()
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip query()
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip store(\Domain\Trips\Data\CreateTripData $data)
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip whereCarId($value)
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip whereCreatedAt($value)
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip whereDate($value)
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip whereId($value)
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip whereMiles($value)
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip whereUpdatedAt($value)
 * @method static \Domain\Trips\Queries\TripQueryBuilder|Trip whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperTrip {}
}

namespace Domain\Users\Models{
/**
 * Domain\Users\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Domain\Trips\Models\Car> $cars
 * @property-read int|null $cars_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Domain\Trips\Models\Trip> $trips
 * @property-read int|null $trips_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

