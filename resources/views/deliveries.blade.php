@extends('layouts.app')
@section('content')
    @if(isset($client))
    <div class="container text-center">
        <div class="row">
            <div class="col page-block-left client-info">
                <h3>Klienta vizītkarte:</h3>
                <div>
                    Klients: {{$client->name}}
                </div>
                <div>
                    Klienta tālruņa numurs: {{$client->phone}}
                </div>
                <div>
                    Klienta e-pasts: {{$client->email}}
                </div>
            </div>
            <div class="col page-block-left">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Adrese</th>
                        <th scope="col">Piegādes datums</th>
                        <th scope="col">Preču summa</th>
                        <th scope="col">Piegādes statuss</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveries as $delivery)
                    <tr>
                            <td>{{$delivery->address->address}}</td>
                            <td>{{$delivery->route->delivered_at}}</td>
                            <td>{{$delivery->getDeliveryLine($delivery->id)}}</td>
                            <td>{{$delivery->getStatusMessage($delivery->status)}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
        <div>
            <a href="./clients" class="error-link">Lūdzu izvēlieties klientu >></a>
        </div>
    @endif
@endsection
