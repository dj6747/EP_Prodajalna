@extends('orders.index')

@section('orders')
    <h3>Cancelled orders</h3>
    @foreach($orders as $order)
        {{$order}}
    @endforeach
@endsection