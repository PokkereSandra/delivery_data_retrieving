<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

class ShowClientsService
{
    public function showAllClients(): Collection
    {
        return Client::all();
    }

    public function showClientDetails(int $id)
    {
        return Client::where('id', $id)->first();
    }

}
