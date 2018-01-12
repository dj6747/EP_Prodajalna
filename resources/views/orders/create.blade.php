@extends('layouts.app')

@section('content')
    <div class="container">
        NAROČNIK:
        {{$user}}
        <ul>
            <li>{{$user->firstname}}</li>
            <li>{{$user->lastname}}</li>
            <li>{{$user->email}}</li>
            <li>{{$user->address}}</li>

        </ul>

        <ul>
        @foreach($shopping_bag as $article)
            <li>{{$article->name}}  količina:{{$article->quantity}}</li>

        @endforeach
        </ul>
        <button class="btn btn-success">Finish</button> {{--TODO: POST to route(order.store)--}}
    </div>
@endsection