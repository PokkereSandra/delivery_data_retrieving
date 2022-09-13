<?php

namespace App\Http\Controllers;

use App\Services\ShowAddressService;
use App\Services\ShowClientsService;
use App\Services\ShowDeliveryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;


class PagesController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('home');
    }

    public function clients(): Factory|View|Application
    {
        $clients = (new ShowClientsService())->showAllClients();

        return view('clients', [
            'clients' => $clients
        ]);
    }

    public function deliveries($id = null): Factory|View|Application
    {
        if ($id == null) {
            return view('deliveries');
        }
        $client = (new ShowClientsService())->showClientDetails($id);
        $deliveries = (new ShowDeliveryService())->showDeliveriesToAddress($id);

        return view('deliveries', [
            'client' => $client,
            'deliveries' => $deliveries,
        ]);
    }

    public function deliveryTypes(): Factory|View|Application
    {
        $clientsWithBothTypes = (new ShowAddressService())->showAddressesWithDifferentTypes();
        return view('delivery-types', [
            'clientsWithBothTypes' => $clientsWithBothTypes
        ]);
    }

    public function lastDelivery(): Factory|View|Application
    {
        $deliveries = (new ShowDeliveryService())->showLastDeliveries();
        return view('last-delivery', [
            'deliveries' => $deliveries
        ]);
    }

    public function inactiveClients(): Factory|View|Application
    {
        $deliveriesWithoutLiquid = (new ShowDeliveryService())->showInactive();
        return view('inactive-clients', [
            'deliveriesWithoutLiquid' => $deliveriesWithoutLiquid
        ]);
    }

    public function show($id): JsonResponse
    {
        return (new ShowAddressService())->showAddress($id);
    }
}
