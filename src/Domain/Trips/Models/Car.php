<?php

declare(strict_types=1);

namespace Domain\Trips\Models;

use Database\Factories\CarFactory;
use Domain\Trips\Queries\CarQueryBuilder;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCar
 */
class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'make',
        'model',
        'year',
    ];

    public function newEloquentBuilder($query): CarQueryBuilder
    {
        return new CarQueryBuilder($query);
    }

    protected static function newFactory(): CarFactory
    {
        return CarFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}
