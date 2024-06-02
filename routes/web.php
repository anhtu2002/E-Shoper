<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function(){
    return redirect()->route('home');
});
//user
Route::middleware('guest')->group(function(){
    Route::get('/login', [UserController::class, 'index'])->name('user.login');
    Route::post('/login', [UserController::class, 'check_login'])->name('user.check_login');
    Route::get('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/register', [UserController::class, 'save_register'])->name('user.save_register');
});

Route::middleware('web')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/filter', [HomeController::class, 'filter'])->name('filter');
    Route::get('/detail/{product_id}', [HomeController::class, 'product_detail'])->name('product.detail');
});


Route::middleware('auth')->group(function() {
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    // cart
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/add-cart', [CartController::class, 'add_cart'])->name('add-cart');
    Route::post('/mua_ngay', [CartController::class, 'mua_ngay'])->name('mua_ngay');
    Route::get('/delete-cart/{cart_id}', [CartController::class, 'delete_cart'])->name('delete-cart');
    Route::get('/change-quantity-cart/{action}/{cart_id}', [CartController::class, 'update_cart'])->name('update-cart');
    // checkout
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

    // address
    Route::post('/add_new_address', [AddressController::class, 'add_new_address'])->name('add_new_address');
});

