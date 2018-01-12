@extends('layouts.unauthorized')

@section('content')
    <div class="container">
        <div class="row">
        @foreach($articles as $article)
            <div class="col-md-3">
                <b>{{$article->name}}</b>
                <p>
                <img src="{{$article->image}}"height="42" width="42">
                <p>
                {{$article->price}} €
                <p>
                <a href="/register" class="btn btn-primary">Buy</a>
            </div>
        @endforeach
        </div>
    </div>
@endsection