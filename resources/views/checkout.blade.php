@extends('layouts.app')

@section('products')

<link rel="stylesheet" href="{{ mix('css/checkout.css') }}">

<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="post" action="{{ route ('order') }}">
        @csrf
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Name</label>
            <input type="text" id="fname" name="name" placeholder="John M. Doe">
            <label for="email"><i class="fas fa-phone-alt"></i> Phone Number</label>
            <input type="text" id="email" name="phoneNumber" placeholder="Phone Number">
            <label for="adr"><i class="fa fa-home"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York"> 
          </div>
        </div>
        <button type="submit" value="Continue to checkout" class="btn">Continue to checkout</button>
      </form>
    </div>
  </div>
</div>
@endsection