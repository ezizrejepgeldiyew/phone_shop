<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OurBrandController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\KuriyentController;
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

Route::get('cart', [IndexController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [IndexController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [IndexController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [IndexController::class, 'remove'])->name('remove.from.cart');


Route::controller(IndexController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('cart','cart')->name('cart');
    Route::get('store','store')->name('store');
    Route::get('product1/{product}','product')->name('product1');
    Route::post('review/{product}','review')->name('review');
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
