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
        <h5 class="card-title">Order Detail</h5>
    </div>
    <div style="padding-bottom: 25px;" class="information">
        <div>Name: {{$order->name}}</div>
        <div>Phone Number: {{$order->phone_number}}</div>
        <div>Address: {{$order->address}}</div>
        <div>City: {{$order->city}}</div>
        <div>Status: {{$order->status}}</div>
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                    <th scope="col">product</th>
                    <th scope="col">name product</th>
                    <th scope="col">quantity</th>
                    <th scope="col">price</th>
                </tr>
            </thead>
            @foreach ($products as $p)
            <tbody>
                <tr>
                    <td>{{$p->pid}}</td>
                    <td><img src="/{{$p->img}}" alt="Girl in a jacket" width="50"></td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->quantity}}</td>
                    <td>{{$p->price}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection