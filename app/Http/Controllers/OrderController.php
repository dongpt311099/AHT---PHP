<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Routing\Controller as BaseController;

class orderController extends BaseController
{
    public function orders(Request $request)
    {
        $checkout = Checkout::all();
        return view('admin.orders')->with([
            "checkout" => $checkout
        ]);
    }

    public function orderDetail(Request $request, $orderId)
    {
        $order = Checkout::join('users', 'users.id', '=', 'checkout.idUser')->select(["users.name", "checkout.*"])->find($orderId);
        $details = Checkout::where("checkout.id", $orderId)
            ->join('products', 'checkout.idProduct', '=', 'products.id')
            ->get(["products.id AS pid",
               "products.img",
               "products.name",
               "products.salePrice",
               "checkout.quantity",
               "checkout.sub_total",
               "checkout.shipping",
               "checkout.status",
            ]);
            
        return view('admin.orderDetail')->with([
            "orderInfo" => $order,
            "orderDetail" => $details
        ]);
    }
}
