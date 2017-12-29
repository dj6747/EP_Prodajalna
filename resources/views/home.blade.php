@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Articles</h3>
    @foreach($articles as $article)
        {{$article->name}}
        <label for="{{$article->id}}">Quantity:</label>
        <input type="text" id="{{$article->id}}" value="0" />
        <button class="btn btn-primary" onclick="buy('{{$article->id}}')">Buy</button>
    @endforeach
</div>
@endsection

@section('scripts')
    <script type="application/javascript">
        var buy = function(id) {
            $.ajax({
                url: '{{route('shopping-bag.store')}}',
                type: 'POST',
                data: JSON.stringify({
                    id: id,
                    quantity: parseInt($('#'+id).val())
                }),
                success: function(res) {
                    console.log(res);
                },
                contentType : 'application/json',
            });
        }
    </script>
@endsection
