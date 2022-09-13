@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col page-block-left">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Klients</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{$client->name}}</td>
                            <td>
                                <button type="button" value="{{$client->id}}" class="show-addresses">Parādīt adreses</button>
                            </td>
                            <td>
                                <form method="get" action="{{asset('/deliveries/'. $client->id)}}">
                                    <input type="submit" value="Atvērt piegādes">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col page-block-right">
                <ul class="address-list"></ul>
            </div>
        </div>
    </div>
@endsection
