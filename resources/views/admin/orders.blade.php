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
                    <td><a href="{{ route('orderDetail', ['orderId' => $c->id]) }}">{{$c->id}}</a></td>
                    <td><a href="{{ route('orderDetail', ['orderId' => $c->id]) }}">{{$c->id_user}}</a></td>
                    <td><a href="{{ route('orderDetail', ['orderId' => $c->id]) }}">{{$c->name}}</a></td>
                    <td>
                        <select class="orderStatus" statusLink="{{ route('status', ['orderId' => $c->id, 'status'=> '_status_']) }}" name="status">
                            <option value="0" {{$c->status == 0 ? 'selected="selected"':''}}>Chờ xác nhận</option>
                            <option value="1" {{$c->status == 1 ? 'selected="selected"':''}}>Đã xác nhận</option>
                            <option value="2" {{$c->status == 2 ? 'selected="selected"':''}} >Đang vận chuyển</option>
                            <option value="3" {{$c->status == 3 ? 'selected="selected"':''}} >Thành công</option>
                        </select>
                    </td>
                    <td><a href="{{ route('orderDetail', ['orderId' => $c->id]) }}">{{$c->sub_total}}</a></td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection