<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrdersProducts;
use Illuminate\Routing\Controller as BaseController;
use Orders as GlobalOrders;

class orderController extends BaseController
{
    public function orders(Request $request)
    {
        $checkout = Orders::all();
        return view('admin.orders')->with([
            "checkout" => $checkout
        ]);
    }

    public function orderDetail(Request $request, $orderId)
    {
        $order = Orders::where("id", $orderId)->first();
        
        $products = OrdersProducts::where("id_orders", $orderId)
        ->join("products", "orders_products.id_products", "=", "products.id")->get([
            "products.id as pid",
            "products.img",
            "products.name",
            "orders_products.quantity",
            "orders_products.price"
        ]);

            
        return view('admin.orderDetail')->with([
            "order" => $order,
            "products" => $products
            // "orderDetail" => $details
        ]);
    }

    public function status(Request $request, $orderId, $status)
    {
        try{
            $stt = Orders::find($orderId);

            $stt->status = $status;
            
            $stt->save();
    
            return  response()->json([
                "error" => false,
                "message" => "Thay đổi trạng thái đơn hàng thành công"
            ]);
        }
        catch(\Exception $e){
            return  response()->json([
                "error" => true,
                "message" => $e->getMessage()
            ]);
        }
    }
}
