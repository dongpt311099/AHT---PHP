<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\OrdersProducts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
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
        if( Auth::check() ){
            $uid = $request->user()->id;
            $cart = Cart::where("idUser", $uid)->sum("quantity");
            $data['cart'] = $cart;
        }

        return view('checkout')->with([
            "cart" => $cart
        ]);
    }

    public function order(Request $request)
    {
        $uid = $request->user()->id;
        
        $products = Cart::where("idUser", $request->user()->id)
        ->join('products', 'cart.idProduct', '=', 'products.id')
        ->get(["products.id AS pid",
               "products.salePrice",
               "cart.quantity"
            ]);

        $sum = $products->sum(function ($product) {
            return $product->quantity * $product->salePrice;
        });

        $order = Orders::create([
            'id_user' => $uid,
            'name' => $request->name,
            'phone_number' => $request->phoneNumber,
            'address' => $request->address,
            'city' => $request->city,
            'status' => '0',
            'shipping' => 35000,
            'sub_total' => $sum
        ]);

        foreach($products as $p){
            OrdersProducts::Create([
                'id_orders' => $order->id,
                'id_products' => $p->pid,
                'quantity' => $p->quantity,
                'price' => $p->price
            ]);
        }

        return redirect(route("checkout"));     
    }

    
}
