<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index']);
Route::get('/clients', [PagesController::class, 'clients']);
Route::get('/deliveries', [PagesController::class, 'deliveries']);
Route::get('/delivery-type', [PagesController::class, 'deliveryTypes']);
Route::get('/last-delivery', [PagesController::class, 'lastDelivery']);
Route::get('/inactive-clients', [PagesController::class, 'inactiveClients']);
Route::get('/deliveries/{id}', [PagesController::class, 'deliveries']);
Route::get('/show-addresses/{id}', [PagesController::class, 'show']);


