<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OurBrandController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\KuriyentController;
use App\Http\Controllers\CartJqueryController;
use Illuminate\Support\Facades\Auth;

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




Route::controller(IndexController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('checkout','checkout')->name('checkout');
    Route::get('cart','cart')->name('cart');
    Route::get('store','store')->name('store');
    Route::get('product1/{product}','product')->name('product1');
    Route::post('review/{product}','review')->name('review');
    Route::get('search','search')->name('search');
    Route::get('category_checkbox','category_checkbox')->name('category_checkbox');
    Route::post('price-filter','price')->name('price.filter');
});
Route::controller(CartJqueryController::class)->group(function(){
 // CART AJAX
    Route::get('add-to-cart','addToCart')->name('add.to.cart');
    Route::post('update-cart','update')->name('update.cart');
    Route::get('remove-from-cart','remove')->name('remove.from.cart');
// WISH AJAX
    Route::get('add-to-wish','addToWish')->name('add.to.wish');
});


Route::resources([
    'category' => CategoryController::class,
    'ourbrand' => OurBrandController::class,
    'country' => CountryController::class,
    'product' => ProductController::class,
    'kuriyent' => KuriyentController::class,
]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
