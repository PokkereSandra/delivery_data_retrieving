<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Collection;

class ShowDeliveryService
{

    public function showDeliveriesToAddress($id): Collection
    {
        $addresses_id = [];
        foreach (Address::all()->where('client_id', $id) as $address) {
            $addresses_id[] = $address->id;
        }
        return Delivery::all()->whereIn('address_id', $addresses_id);
    }

    public function showInactive(): Collection
    {
        return Delivery::all()->where('type', 2)->unique('address_id');
    }

    public function showLastDeliveries(): Collection
    {
        return Delivery::all()->where('status', 2)
            ->sortByDesc('route.delivered_at')
            ->unique('address_id');
    }

}
