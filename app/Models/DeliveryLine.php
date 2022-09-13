<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryLine extends Model
{
    use HasFactory;

    protected $fillable = ['delivery_id', 'item', 'price', 'quantity'];

    public function delivery(): BelongsTo
    {
        return $this->belongsTo(Delivery::class);
    }

    public function sumOfDelivery(): string
    {
        $sum = $this->price * $this->quantity;
        return number_format($sum,2);
    }
}
