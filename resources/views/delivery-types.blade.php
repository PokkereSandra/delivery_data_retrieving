@extends('layouts.app')
@section('content')
    <div class="container page-block-left">
        <div class="both-types-row">
            <div class="both-types">
            <h3>Klienti, kuriem ir bijusi gan cietā, gan šķidrā prece</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Klients</th>
                    <th scope="col">Piegādes adrese</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientsWithBothTypes as $client)
                    <tr>
                        <td>{{$client->address->client->name}}</td>
                        <td>{{$client->address->address}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
