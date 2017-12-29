@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Shopping bag</h3>
        @foreach($bag as $article)
            <div class="article-{{$article->id}}">
                <span>{{$article}}</span>
                <input type="text" id="{{$article->id}}" value="{{$article->quantity}}" />  {{--TODO: spremeni input v numeričen--}}
                <button class="btn btn-primary" onclick="change_quantity('{{$article->id}}')">Change Quantity</button>
                <button class="btn btn-danger" onclick="remove_article('{{$article->id}}')">Remove article</button>
            </div>
        @endforeach
        <br>
        <a class="btn btn-success" href="{{route('orders.create')}}">Order</a>
    </div>
@endsection

@section('scripts')
    <script type="application/javascript">
        var change_quantity = function(id) {
            var quantity = parseInt($('#'+id).val());

            if (quantity < 0) {
                alert('Quantity can not be less than 0.');
                return;
            }

            $.ajax({
                url: '/shopping-bag/'+id,
                type: 'PUT',
                data: JSON.stringify({
                    quantity: quantity
                }),
                success: function(res) {
                    $('#'+id).val(0);
                    window.location.reload();//TODO: posodobi view ko se updata z novo količino brez reloada
                },
                contentType : 'application/json',
            });
        }


        var remove_article = function(id) {
            $.ajax({
                url: 'shopping-bag/'+id,
                type: 'DELETE',
                success: function(res) {
                    $('.article-'+id).html('');
                },
                contentType : 'application/json',
            });
        }

    </script>
@endsection
