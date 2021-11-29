<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/home', [IndexController::class, 'index']);
Route::get('/collections', [IndexController::class, 'listProducts']);
Route::get('/productDetail/{id}', [IndexController::class, 'productDetail'])->name("product.detail");
Route::get('/cart', [IndexController::class, 'cart'])->name('cart');

Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::post('/login', [IndexController::class, 'authen']);
Route::get('/myOrder', [IndexController::class, 'myOrder'])->name('myOrder');
Route::get('/logout', [IndexController::class, 'logout'])->name('logout');

Route::get('/signUp', [IndexController::class, 'login']);
Route::post('/signUp', [IndexController::class, 'addUser']);

Route::get('/users', [UserController::class, 'users'])->name('users')->middleware(['auth','check.admin']);

Route::get('/user', [UserController::class, 'createUserView'])->name('createUserView');
Route::post('/user', [UserController::class, 'createUser'])->name('createUser');

Route::get('/user/{id}', [UserController::class, 'editUserView'])->name('editUserView');
Route::put('/user/{id}', [UserController::class, 'updateUser'])->name('updateUser');
Route::delete('/user/{id}', [UserController::class, 'Delete']);

Route::get('/products', [ProductController::class, 'products'])->name('products')->middleware(['auth','check.admin']);

Route::get('/createProduct', [ProductController::class, 'createProductView'])->name('createProductView');
Route::post('/createProduct', [ProductController::class, 'createProduct'])->name('createProduct');

Route::get('/editProduct/{id}', [ProductController::class, 'editProductView'])->name('editProductView');
Route::put('/editProduct/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');
Route::delete('/editProduct/{id}', [ProductController::class, 'Delete']);

Route::post('/addCart', [CartController::class, 'addCart']);
Route::delete('/cart/{productId}', [CartController::class, 'Delete'])->name('deleteCart');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/order', [CartController::class, 'order'])->name('order');

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'orders'])->name('orders');
    Route::get('/detail/{orderId}', [OrderController::class, 'orderDetail'])->name('orderDetail');
    Route::put('/detail/{orderId}/status/{status}', [OrderController::class, 'status'])->name('status');
});