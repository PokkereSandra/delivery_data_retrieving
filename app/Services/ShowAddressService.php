<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;


class ShowAddressService
{

    public function showAddress(int $id): JsonResponse
    {
        $clientAddresses = Address::where('client_id', $id)->get();
        return Response::json([
            'clientAddresses' => $clientAddresses
        ]);
    }


    public function showAddressesWithDifferentTypes(): Collection
    {
        $addressesWithFirstType = [];
        $addressesWithSecondType = [];
        foreach (Delivery::all()->where('type', 1) as $delivery) {
            $addressesWithFirstType[] = $delivery->address_id;
        }
        foreach (Delivery::all()->where('type', 2) as $delivery) {
            $addressesWithSecondType[] = $delivery->address_id;
        }
        $addressesWithBothTypes = array_intersect($addressesWithFirstType, $addressesWithSecondType);

        return Delivery::all()->whereIn('address_id', $addressesWithBothTypes)->unique('address_id');

    }

}
