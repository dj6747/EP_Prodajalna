@extends('orders.index')

@section('orders')
    <h3>Confirmed orders</h3>
    @foreach($orders as $order)
        {{$order}}

        
    @endforeach
@endsection