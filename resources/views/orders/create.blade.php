@extends('layouts.app')

@section('content')
    <div class="container">
        {{$user}}
        @foreach($shopping_bag as $article)
            {{$article}}
        @endforeach

        <button class="btn btn-success">Finish</button> {{--TODO: POST to route(order.store)--}}
    </div>
@endsection