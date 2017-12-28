@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('orders.waiting')}}">Waiting orders</a>
        <a href="{{route('orders.confirmed')}}">Confirmed orders</a>
        @yield('orders')
    </div>
@endsection