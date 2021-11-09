@extends('admin.layouts.index')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="card-title">Add Product</div>
        <hr>
        <form method="post" action="{{ $urlAction }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="input-1">Img</label>
                <input value="{{ isset($product) ? $product->image : '' }}" type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label for="input-1">Name</label>
                <input value="{{ isset($product) ? $product->name : '' }}" type="text" class="form-control" name="name" id="input-1" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label for="input-2">Rate</label>
                <select class="form-control" name="rate">
                    @for ($i = 1; $i < 6; $i++)
                        @if(isset($product) && $i == $product->rate)
                            <option selected value="{{$i}}">{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="input-1">Description</label>
                <input value="{{ isset($product) ? $product->description : '' }}" type="text" class="form-control" name="description" id="input-1" placeholder="Enter Your description">
            </div>
            <div class="form-group">
                <label for="input-1">Price</label>
                <input value="{{ isset($product) ? $product->price : '' }}" type="text" class="form-control" name="price" id="input-1" placeholder="Enter Your Price">
            </div>
            <div class="form-group">
                <label for="input-1">Sale Price</label>
                <input value="{{ isset($product) ? $product->salePrice : '' }}" type="text" class="form-control" name="salePrice" id="input-1" placeholder="Enter Your sale price">
            </div>
            <div style="color: firebrick; text-align: center">{{isset($error) ? $error : ""}}</div>
            <div class="form-group">
                @if(isset($product))
                @method('PUT')
                @endif
                <button type="submit" class="btn btn-light px-5"><i class="icon-user"></i> Add</button>
            </div>
        </form>
    </div>
</div>

@endsection