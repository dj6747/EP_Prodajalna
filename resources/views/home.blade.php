@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Articles</h3>
    @foreach($articles as $article)
        {{$article->name}}
        <label for="{{$article->id}}">Quantity:</label>
        <input type="text" id="{{$article->id}}" value="0" /> {{--TODO: spremeni input v numeričen--}}
        <button class="btn btn-primary" onclick="buy('{{$article->id}}')">Buy</button>
    @endforeach
</div>
@endsection

@section('scripts')
    <script type="application/javascript">
        var buy = function(id) {

            var quantity = parseInt($('#'+id).val());

            if (quantity <= 0) {
                alert('Quantity can not be less than 1.');
                return;
            }

            $.ajax({
                url: '{{route('shopping-bag.store')}}',
                type: 'POST',
                data: JSON.stringify({
                    id: id,
                    quantity: quantity
                }),
                success: function(res) {
                    $('#'+id).val(0);
                },
                contentType : 'application/json',
            });
        }
    </script>
@endsection
