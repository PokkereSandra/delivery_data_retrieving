@extends('layouts.app')
@section('content')
    <div class="page-block-left">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Klients</th>
                <th scope="col">Piegādes adrese</th>
                <th scope="col">Pasūtījuma datums</th>
                <th scope="col">Pasūtījuma tips</th>
                <th scope="col">Pasūtījuma summa</th>
            </tr>
            </thead>
            <tbody>
            @foreach($deliveries as $delivery)
                <tr>
                    <td>{{$delivery->address->client->name}}</td>
                    <td>{{$delivery->address->address}}</td>
                    <td>{{$delivery->route->delivered_at}}</td>
                    <td>{{$delivery->getProductType($delivery->type)}}</td>
                    <td>{{$delivery->getDeliveryLine($delivery->id)}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
