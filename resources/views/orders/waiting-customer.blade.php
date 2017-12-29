@extends('orders.index')

@section('orders')
    <h3>Waiting orders</h3>
    @foreach($orders as $order)
        {{$order}}<br>
        Articles:{{$order->articles}}
    @endforeach
@endsection