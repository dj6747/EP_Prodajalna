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
        @foreach($sellers as $seller)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$seller->firstname}}</td>
                <td>{{$seller->lastname}}</td>
                <td>{{$seller->email}}</td>
                <td>{{$seller->phone}}</td>
                <td>{{$seller->address}}</td>
                <td>{{$seller->zip_code->full_name()}}</td>
                <td>{{$seller->active}}</td>
                <td>
                    <div aria-label="Actions">
                        <button type="button" class="btn btn-primary btn-xs">Edit</button>
                        <button type="button" class="btn btn-danger btn-xs">Delete</button>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
