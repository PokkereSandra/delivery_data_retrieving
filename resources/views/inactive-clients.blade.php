@extends('layouts.app')
@section('content')
    <div class="container page-block-left">
        <div class="both-types-row">
            <div class="both-types">
                <h3>Klienti, kuriem nekad nav piegādāta šķidrā prece</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Klienta nosaukums</th>
                        <th scope="col">Klienta adrese</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveriesWithoutLiquid as $delivery)
                        <tr>
                            <td>{{$delivery->address->client->name}}</td>
                            <td>{{$delivery->address->address }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
