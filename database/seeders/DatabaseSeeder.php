<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Client;
use App\Models\Delivery;
use App\Models\DeliveryLine;
use App\Models\Route;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Client::factory(50)->create()->each(function ($client) {
            Address::factory(3)->create(['client_id' => $client->id])->each(function ($address) {
                Delivery::factory(2)->create(['address_id' => $address->id])->each(function ($delivery) {
                    DeliveryLine::factory(2)->create(['delivery_id' => $delivery->id]);
                });
            });
        });

        Route::factory(7)->create();

    }
}
