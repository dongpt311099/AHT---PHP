@extends('layouts.app')

@section('products')
<div class="product-container">
    <!-- Product title -->
    <div class="product-title">
        <div class="franco">franco</div>
        <div class="featured">featured items</div>
        <hr class="line">
    </div>
    <!-- End Product title -->

    <!-- Product items -->
    <div class="product-items">
        <div class="row product-info">
            @foreach ($products as $product)
            <div class="col product-info-item">
                <div class="product-info-item-thumbnail">
                    <img src="/{{$product->img}}" class="img" alt="Girl in a jacket">
                    @guest
                    <div class="btn-add"><a href="{{ url('login') }}">add to cart</a></div>
                    @endguest
                    @auth
                    <div class="btn-add"><a class="addCart" pid="{{$product->id}}" q="1" href="javascript:;">add to cart</a></div>
                    @endauth
                </div>
                <div class="product-info-item-content">
                    <div class="title"><a href="{{ route('product.detail', ['id' => $product->id]) }}">{{$product->name}}</a></div>
                    <div class="rate">
                        @for ($i = 1; $i <= 5; $i++) <div class="{{ $i <= $product->rate ? 'active' : '' }}"><i class="far fa-star"></i></div>
                        @endfor
                </div>
                <div class="price">
                    <div class="cost">{{$product->price}}</div>
                    <div class="sale-price">{{$product->salePrice}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
<!-- End Product items -->
</div>
@endsection

@section('blogs')
@include("layouts.blog")
@endsection

@section('banners')
@include("layouts.banners")
@endsection