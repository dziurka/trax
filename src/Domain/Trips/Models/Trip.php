<?php

namespace Domain\Trips\Models;

use Database\Factories\TripFactory;
use Domain\Trips\Queries\TripQueryBuilder;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperTrip
 */
class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'date',
        'miles',
        'car_id',
    ];

    protected $casts = [
        'date' => 'date',
        'miles' => 'double',
    ];

    public function newEloquentBuilder($query): TripQueryBuilder
    {
        return new TripQueryBuilder($query);
    }

    protected static function newFactory(): TripFactory
    {
        return TripFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
