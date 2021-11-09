<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        
        $products = Product::orderBy('id', 'desc')->take(8)->get();
        $data = [
            "products" => $products
        ];
       
        if( Auth::check() ){
            $uid = $request->user()->id;
            $cart = Cart::where("idUser", $uid)->sum("quantity");
            $data['cart'] = $cart;
        }
        

        return view('products')->with($data);
    }

    public function listProducts(Request $request)
    {
        
        $products = Product::all();
        $data = [
            "products" => $products
        ];

        if( Auth::check() ){
            $uid = $request->user()->id;
            $cart = Cart::where("idUser", $uid)->sum("quantity");
            $data['cart'] = $cart;
        }

        return view('listProducts')->with($data);
    }

    public function productDetail(Request $request, $id)
    {
        $product = Product::find($id);
        return view('productDetail')->with([
            "product" => $product
        ]);
    }

    public function cart(Request $request)
    {
        $products = Cart::where("idUser", $request->user()->id)
        ->join('products', 'cart.idProduct', '=', 'products.id')
        ->get(["products.id AS pid",
               "products.img",
               "products.name",
               "products.salePrice",
               "cart.id AS cardId",
               "cart.quantity"
            ]);
        
        if( Auth::check() ){
            $uid = $request->user()->id;
            $cart = Cart::where("idUser", $uid)->sum("quantity");
            $data['cart'] = $cart;
        }

        $sum = $products->sum(function ($product) {
            return $product->quantity * $product->salePrice;
        });

        return view('cart')->with([
            "products" => $products,
            "cart" => $cart,
            "sum" => $sum,
            "ship" => 35000
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $u = User::where('email', $request->email)->first();

        if (!isset($u)) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'guest'
            ]);
            return view('login');
        } else {
            return view('login')->with("error", "Email đã tồn tại");
        }
    }

    public function authen(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $isAuth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($isAuth) {
            if(Auth::user()->role =='admin')
            {
                return redirect(route('users'));
            }
            return redirect("/");
        } else {
            return redirect("login")->with("error", "xxxxi");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
