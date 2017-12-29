@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Shopping bag</h3>
        @foreach($bag as $item)
            {{$item}}
        @endforeach
    </div>
@endsection