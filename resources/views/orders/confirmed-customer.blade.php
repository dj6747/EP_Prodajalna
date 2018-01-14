@extends('orders.index')

@section('orders')
    <h3>Confirmed orders</h3>
    @foreach($orders as $order)
        <?php

        $var = 0;
        ?>

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
                    <td>{{$article->price}} €</td>
                    <td>{{$article->pivot->quantity}}</td>
                    <td>{{$article->price*$article->pivot->quantity}} €</td>
                </tr>


                {{$var +=$article->price*$article->pivot->quantity }}

            @endforeach
            <tr> <th></th>
                <td></td>
                <td></td>
                <td><b>SKUPAJ: {{$var}}€</b></td>
            </tr>

            </tbody>
        </table>
        <br>
        <br>
    @endforeach
@endsection