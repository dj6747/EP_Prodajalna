@extends('layouts.app')

@section('content')
    <div class="container">
        NAROČNIK: <b>{{$user->firstname}}</b>

        <ul class="list-group">
            <li class="list-group-item">{{$user->firstname}}</li>
            <li class="list-group-item">{{$user->lastname}}</li>
            <li class="list-group-item">{{$user->email}}</li>
            <li class="list-group-item">{{$user->address}}</li>

        </ul>
        <br>
        <?php

        $var = 0;
        ?>

        <ul class="list-group">
        @foreach($shopping_bag as $article)
            <li class="list-group-item">
                <b>{{$article->name}}</b>
                <ul>
                    <li>količina: {{$article->quantity}}</li>
                    <li>cena enega izdelk: {{$article->price}}€ </li>
                    <li>cena vseh naročenih : {{$article->price*$article->quantity}}€</li>
                    <?php

                    $var = $var + $article->quantity*$article->price;
                    ?>
                </ul>
            </li>
        @endforeach
            <li class="list-group-item"> CENA: {{$var}} €</li>
        </ul>


        <button class="btn btn-success">Finish</button> {{--TODO: POST to route(order.store)--}}
    </div>
@endsection