@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-default" href="/articles/create" role="button">Add article</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Active</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$article->name}}</td>
                    <td>{{$article->price}}</td>
                    <td>{{$article->description}}</td>
                    <td>{{$article->active}}</td>
                    <td>
                        <div aria-label="actions">
                            <a href="{{route('articles.edit', ['id' => $article->id])}}" type="button" class="btn btn-primary btn-xs">Edit</a>
                            <a href="javascript:removeArticle('{{$article->firstname}}', '{{$article->id}}')" type="button" class="btn btn-danger btn-xs">Delete</a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('scripts')
    <script type="application/javascript">

        var removeArticle = function(name, id) {
            var c = confirm('Delete article ' + name + '?');
            if (c) {
                return $.ajax({
                    url: '/articles/'+id,
                    type: 'DELETE',
                    success: function(res) {
                        window.location.reload();
                    },
                    data: {},
                    contentType: 'html'
                });
            }
        }
    </script>
@endsection