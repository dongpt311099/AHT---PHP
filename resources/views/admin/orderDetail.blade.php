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
        @foreach ($checkout as $c)
            <div>Name: {{$c->name}}</div>
            <div>Phone Number: {{$c->phoneNumber}}</div>
            <div>Address: {{$c->address}}</div>
            <div>City: {{$c->city}}</div>
            <div>Status: {{$c->status}}</div>
        @endforeach
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">product</th>
                    <th scope="col">name product</th>
                    <th scope="col">quantity</th>
                    <th scope="col">price</th>
                </tr>
            </thead>
            @foreach ($products as $p)
            <tbody>
                <tr>
                    <td>{{$p->img}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->salePrice}}</td>
                    <td>{{$p->quantity}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection