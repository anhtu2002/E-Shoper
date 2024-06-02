<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
//login
Route::middleware('guest.admin')->group(function(){
    Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/check_login', [AdminController::class, 'check_login_admin'])->name('admin.check_login');
});

Route::middleware('auth.admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    //category product
    Route::get('/add_category', [CategoryProController::class, 'add_cate'])->name('admin.add_category');
    Route::get('/all_category', [CategoryProController::class, 'all_cate'])->name('admin.all_category');
    Route::post('/save_category', [CategoryProController::class, 'save_cate'])->name('admin.save_category');
    Route::get('/change_status_cate/{cate_id}', [CategoryProController::class, 'change_status_cate'])->name('admin.change_status_category');
    Route::get('/edit_cate/{cate_id}', [CategoryProController::class, 'edit_cate'])->name('admin.edit_category');
    Route::post('/update_cate/{cate_id}', [CategoryProController::class, 'update_cate'])->name('admin.update_category');
    Route::get('/delete_cate/{cate_id}', [CategoryProController::class, 'delete_cate'])->name('admin.delete_category');

    //brand product
    Route::get('/add_brand', [BrandController::class, 'add_brand'])->name('admin.add_brand');
    Route::get('/all_brand', [BrandController::class, 'all_brand'])->name('admin.all_brand');
    Route::post('/save_brand', [BrandController::class, 'save_brand'])->name('admin.save_brand');
    Route::get('/change_status_brand/{brand_id}', [BrandController::class, 'change_status_brand'])->name('admin.change_status_brand');
    Route::get('/edit_brand/{brand_id}', [BrandController::class, 'edit_brand'])->name('admin.edit_brand');
    Route::post('/update_brand/{brand_id}', [BrandController::class, 'update_brand'])->name('admin.update_brand');
    Route::get('/delete_brand/{brand_id}', [BrandController::class, 'delete_brand'])->name('admin.delete_brand');

    //product 
    Route::get('/add_product', [ProductController::class, 'add_product'])->name('admin.add_product');
    Route::get('/all_product', [ProductController::class, 'all_product'])->name('admin.all_product');
    Route::post('/save_product', [ProductController::class, 'save_product'])->name('admin.save_product');
    Route::get('/change_status_product/{product_id}', [ProductController::class, 'change_status_product'])->name('admin.change_status_product');
    Route::get('/edit_product/{product_id}', [ProductController::class, 'edit_product'])->name('admin.edit_product');
    Route::post('/update_product/{product_id}', [ProductController::class, 'update_product'])->name('admin.update_product');
    Route::get('/delete_product/{product_id}', [ProductController::class, 'delete_product'])->name('admin.delete_product');

});
