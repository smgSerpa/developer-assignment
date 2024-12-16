<?php

namespace App\Models;

use App\Enums\PriceProviders;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
* @property int $id
* @property string $provider
* @property double $price
* @property Carbon $delivery_start
* @property Carbon $delivery_end
* @property Carbon $created_at
* @property Carbon $updated_at
    *
* @property-read double $price_multiplied
*/
class Price extends Model
{
    protected $fillable = [
        'provider',
        'price',
        'delivery_start',
        'delivery_end',
    ];

    protected $casts = [
        'provider' => PriceProviders::class,
        'price' => 'double',
        'delivery_start' => 'datetime',
        'delivery_end' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::retrieved(function (Price $record) {
            $record->price_multiplied = round($record->price * config('nordpool.price_multiplier'), 2);
        });
    }
}
