@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        @foreach($articles as $article)
                <div class="col-md-1"><div>{{$article->name}}</div><img src="{{$article->image}}"/> </div>

        @endforeach
        </div>
    </div>
@endsection
