@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Articles</h3>
    @foreach($articles as $article)
        <div class="col-md-3">
            <b>{{$article->name}}</b>
            <p>
                <img src="{{$article->image}}"height="100" width="100">
            <p>
                {{$article->price}} €
            <p>
                <label for="{{$article->id}}">Quantity:</label>
                <input type="number" id="{{$article->id}}" value="0"  class="form-control" min="0" max="100"/>
            <p>
                <button class="btn btn-primary" onclick="buy('{{$article->id}}')">Buy</button>

        </div>
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
