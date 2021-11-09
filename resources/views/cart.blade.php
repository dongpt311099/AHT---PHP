@extends('layouts.app')

@section('products')

<link rel="stylesheet" href="{{ mix('css/cart.css') }}">
<div class="wrap cf">
    <div class="heading cf">
        <h1>My Cart</h1>
        <a href="/collections" class="continue">Continue Shopping</a>
    </div>
    <div class="cart">
        <!--    <ul class="tableHead">
      <li class="prodHeader">Product</li>
      <li>Quantity</li>
      <li>Total</li>
       <li>Remove</li>
    </ul>-->
        <ul class="cartWrap">
            @foreach ($products as $product)
            <li class="items odd">
                <div class="infoWrap">
                    <div class="cartSection">
                        <img src="/{{$product->img}}" alt="" class="itemImg" />
                        <h3 style="padding-bottom: 15px">{{$product->name}}</h3>

                        <div class="buttons_added">
                            <input class="minus is-form btnTru" price="{{$product->salePrice}}" pid="{{$product->pid}}" q="-1" type="button" value="-">
                            <input class="input-qty" type="number" style="width: 48px" disabled value="{{$product->quantity}}">
                            <input class="plus is-form btnCong" price="{{$product->salePrice}}" pid="{{$product->pid}}" q="1" type="button" value="+">
                        </div>
                    </div>

                    <div total="{{$product->salePrice * $product->quantity}}" class="prodTotal cartSection">
                        <p>{{$product->salePrice * $product->quantity}}</p>
                    </div>
                    <form method="POST" action="{{ route ('deleteCart', ['productId' => $product->pid]) }}" class="cartSection removeWrap">
                        @csrf

                        @method('DELETE')
                        <button type="submit" class="remove">x</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="subtotal cf">
        <ul>
            <li class="totalRow"><span class="label">Subtotal</span><span id="subTotal" class="value">{{$sum}}</span></li>

            <li class="totalRow"><span class="label">Shipping</span><span class="value">{{$ship}}</span></li>

            <li class="totalRow final"><span class="label">Total</span><span id="totalPrice" class="value">{{$sum + $ship}}</span></li>
            <li class="totalRow"><a href="/checkout" class="btn continue">Checkout</a></li>
        </ul>
    </div>
</div>
@endsection