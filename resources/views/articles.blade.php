@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($articles as $article)
            <div>
                {{$article->name}}
            </div>
        @endforeach
    </div>
@endsection
