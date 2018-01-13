@extends('orders.index')

@section('orders')
    <h3>Waiting orders</h3>
    @foreach($orders as $order)

        STRANKA: {{$order->customer}}<br>
        ČAS: {{$order->created_at}}<br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">IZDELEK</th>
                <th scope="col">CENA NA KOS</th>
                <th scope="col">KOLIČINA</th>
                <th scope="col">CENA</th>
            </tr>
            </thead>
            <tbody>
        @foreach($order->articles as $article)
            <tr>
                <th>{{$article->name}}</th>
                <td>{{$article->price}}</td>
                <td>{{$article->pivot->quantity}}</td>
                <td>{{$article->price*$article->pivot->quantity}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>
        <button class="btn btn-success" onclick="accept()">Accept</button>
        <button class="btn btn-danger" onclick="refuse()">Refuse</button>
        <br>
        <br>
    @endforeach
@endsection