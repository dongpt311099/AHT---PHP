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
        <h5 class="card-title">Products</h5>
        <a href="/createProduct" class="btn btn-light btn-sm">Add Product</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">img</th>
                    <th scope="col">name</th>
                    <th scope="col">rate</th>
                    <th scope="col" style="max-width: 200px;">Description</th>
                    <th scope="col">price</th>
                    <th scope="col">salePrice</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            @foreach ($products as $product)
            <tbody>
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img src="/{{$product->img}}" alt="Girl in a jacket" width="50"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->rate}}</td>
                    <td style="max-width: 200px; overflow: hidden;text-overflow: ellipsis;">
                        {{$product->description}}
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->salePrice}}</td>
                    <td>
                        <form action="{{ route('updateProduct', ['id' => $product->id]) }}" method="post">
                            @csrf
                            <a href="{{ route('updateProduct', ['id' => $product->id]) }}" class="btn btn-light btn-sm">Edit</a>

                            @method('DELETE')
                            <button type="submit" class="btn btn-light btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection