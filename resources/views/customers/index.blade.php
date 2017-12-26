@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Zip code</th>
            <th scope="col">Active</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$customer->firstname}}</td>
                <td>{{$customer->lastname}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->zip_code->full_name()}}</td>
                <td>{{$customer->active}}</td>
                <td>
                    <div aria-label="actions">
                        <a href="{{route('customers.edit', ['id' => $customer->id])}}" type="button" class="btn btn-primary btn-xs">Edit</a>
                        <a href="javascript:removecustomer('{{$customer->firstname}}', '{{$customer->id}}')" type="button" class="btn btn-danger btn-xs">Delete</a>
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

        var removecustomer = function(name, id) {
            var c = confirm('Delete customer ' + name + '?');
            if (c) {
                return $.ajax({
                    url: '/customers/'+id,
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