<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;


class ProductController extends BaseController
{
    public function products(Request $request)
    {
        $products = Product::all();
        return view('admin.viewProducts')->with([
            "products" => $products
        ]);
    }

    public function createProductView(Request $request)
    {
        $urlAction = route('createProduct');
        return view('admin.createProduct')->with(['urlAction' => $urlAction]);
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'salePrice' => 'required'
        ]);

        if (!$request->hasFile('image')) {
            // Nếu không thì in ra thông báo
            return "Mời chọn file cần upload";
        }
        // Nếu có thì thục hiện lưu trữ file vào public/images
        $image = $request->file('image');
        $storedPath = $image->move('images', $image->getClientOriginalName());

        Product::create([
            'img' => $storedPath,
            'name' => $request->name,
            'rate' => $request->rate,
            'description' => $request->description,
            'price' => $request->price,
            'salePrice' => $request->salePrice,
        ]);
        return redirect(route("products"));
    }

    public function editProductView(Request $request, $id)
    {
        $urlAction = route('updateProduct', ['id' => $id] );
        $p = Product::find($id);
        return view('admin.createProduct')->with([
            "product" => $p,
            'urlAction' => $urlAction
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');

        if(!isEmpty($request->input('image')))
        {
            $product->img = $request->input('image');
        }
        
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->salePrice = $request->input('salePrice');

        $product->save();

        return redirect()->route('products');
    }

    public function Delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
