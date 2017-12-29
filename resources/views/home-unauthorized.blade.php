@extends('layouts.unauthorized')

@section('content')
    <div class="container">
        <h3>Articles</h3>
        @foreach($articles as $article)
            {{$article->name}}
            <a href="/register" class="btn btn-primary">Buy</a>
        @endforeach
    </div>
@endsection