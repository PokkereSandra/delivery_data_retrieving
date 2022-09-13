<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;

    public const STATUS_MADE = 1;
    public const STATUS_PLANNED = 2;
    public const STATUS_CLOSED = 3;

    protected $fillable = ['car_number', 'driver_name', 'status', 'delivered_at'];

    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }

    public function getRouteStatus(int $status): string
    {
        $statuses = [
            self::STATUS_MADE => 'izveidots',
            self::STATUS_PLANNED => 'ieplānots',
            self::STATUS_CLOSED => 'slēgts'
        ];

        return $statuses[$status];
    }

}
