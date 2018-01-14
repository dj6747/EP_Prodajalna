@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('orders.waiting')}}">Waiting orders</a>
        <a href="{{route('orders.confirmed')}}">Confirmed orders</a>
        @if(\Illuminate\Support\Facades\Auth::user()->role === \App\Models\User::ROLE_CUSTOMER)
            <a href="{{route('orders.cancelled')}}">Cancelled orders</a>
        @endif
        @yield('orders')
    </div>
@endsection

@section('scripts')
    <script type="application/javascript">
        var changeStatus = function(id, status) {
            $.ajax({
                url: '/orders/'+id,
                type: 'PUT',
                data: JSON.stringify({
                    review_status: status
                }),
                success: function(res) {
                    if (res.status === 'ok') {
                        window.location.reload();
                    }
                },
                contentType : 'application/json'
            });
        }

    </script>
@endsection