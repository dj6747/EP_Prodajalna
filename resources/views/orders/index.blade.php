@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('orders.waiting')}}">Waiting orders</a>
        <a href="{{route('orders.confirmed')}}">Confirmed orders</a>
        @if(\Illuminate\Support\Facades\Auth::user()->role === \App\Models\User::ROLE_CUSTOMER)
            <a href="{{route('orders.cancelled')}}">Cancelled orders</a>
        @endif
        @yield('orders')
    </div>
@endsection