@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Shopping bag</h3>
        <div class="container">
        @foreach($bag as $article)


            <div class="col-md-3 article-{{$article->id}}">
                <b>{{$article->name}}</b>
                <div>
                    <img src="{{$article->image}}"height="100" width="100">
                </div>
                <div>
                    {{$article->price}} €
                </div>
                <div>
                    <label for="{{$article->id}}">Quantity:</label>
                </div>
                <div class="input-group">
                    <input type="number" id="{{$article->id}}" value="0" min="0" max="100"  class="form-control"/>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" onclick="change_quantity('{{$article->id}}')">Change Quantity</button>
                    </span>
                </div>
                <br>
                <div>
                    <button class="btn btn-danger" onclick="remove_article('{{$article->id}}')">Remove article</button>
                </div>
            </div>
        @endforeach
        </div>
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
