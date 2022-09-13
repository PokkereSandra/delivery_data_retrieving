<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Delivery extends Model
{
    use HasFactory;

    public const STATUS_NOT_DONE = 1;
    public const STATUS_DONE = 2;
    public const STATUS_CANCELLED = 3;

    public const TYPE_LIQUID_PRODUCT = 1;
    public const TYPE_SOLID_PRODUCT = 2;

    protected $fillable = ['address_id', 'route_id', 'type', 'status'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function deliveryLines(): HasMany
    {
        return $this->hasMany(DeliveryLine::class);
    }

    public function getDeliveryLine($id)
    {
        $delivery_line = DeliveryLine::where('delivery_id', $id)->first();
        return $delivery_line?->sumOfDelivery();
    }

    public function getStatusMessage(int $status): string
    {
        $statuses = [
            self::STATUS_NOT_DONE => 'nav izpildīts',
            self::STATUS_DONE => 'ir izpildīts',
            self::STATUS_CANCELLED => 'atcelts',
        ];

        return $statuses[$status];
    }

    public function getProductType(int $type): string
    {
        $types = [
            self::TYPE_LIQUID_PRODUCT => 'šķidra prece',
            self::TYPE_SOLID_PRODUCT => 'cieta prece',
        ];

        return $types[$type];
    }

}
