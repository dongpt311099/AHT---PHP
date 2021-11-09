<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\checkout;
use App\Models\Product;
use Checkout as GlobalCheckout;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Psy\VersionUpdater\Checker;
use Illuminate\Support\Facades\Auth;

class CartController extends BaseController
{
    public function addCart(Request $request)
    {
        $uid = $request->user()->id;
        $pid = $request->productId;
        if(empty($pid)){
            return response()->json(["error" => true, "message" => "Product id ko được để trống"]);
        }

        $c = Product::find($pid);
        if(!isset($c)){
            return response()->json(["error" => true, "message" => "Sản phẩm ko tồn tại"]);
        }

        $cart = Cart::where("idUser", $uid)->where("idProduct", $pid)->first();

        if(isset($cart)){

            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->save();

        }else{
            $cart = Cart::create([
                'idUser' => $uid,
                'idProduct' => $pid,
                'quantity' => $request->quantity
            ]);
        }

        return response()->json([
            "error" => false, 
            "message" => "",
            "data" => Cart::where("idUser", $uid)->sum("quantity")
        ]);
    }

    public function Delete(Request $request, $productId)
    {
        $cart = Cart::where("idProduct",$productId)->first();
        $cart->delete();
        return redirect()->route('cart');
    }

    public function checkout(Request $request)
    {
        $users = Checkout::where("idUser", $request->user()->id)
        ->join('users', 'checkout.idUser', '=', 'users.id')
        ->get(["users.id AS uid"]);
           
        if( Auth::check() ){
            $uid = $request->user()->id;
            $cart = Cart::where("idUser", $uid)->sum("quantity");
            $data['cart'] = $cart;
        }

        return view('checkout')->with([
            "users" => $users,
            "cart" => $cart
        ]);
    }

    public function order(Request $request)
    {
        $uid = $request->user()->id;

        Checkout::create([
            'idUser' => $uid,
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'address' => $request->address,
            'city' => $request->city
        ]);

        return redirect(route("checkout"));
    }

    
}
