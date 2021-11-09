@extends('admin.layouts.index')

@section('content')
<style>
    .title {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
</style>
<div class="card-body">
    <div class="title">
        <h5 class="card-title">Orders</h5>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id user</th>
                    <th scope="col">order</th>
                    <th scope="col">status</th>
                    <th scope="col">price</th>
                </tr>
            </thead>
            @foreach ($checkout as $c)
            <tbody>
                <tr>
                    <td><a href="{{ route('orderDetail') }}">{{$c->id}}</a></td>
                    <td><a href="{{ route('orderDetail') }}">{{$c->idUser}}</a></td>
                    <td><a href="{{ route('orderDetail') }}">{{$c->name}}</a></td>
                    <td><a href="{{ route('orderDetail') }}">{{$c->status}}</a></td>
                    <td><a href="{{ route('orderDetail') }}">{{$c->price}}</a></td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection