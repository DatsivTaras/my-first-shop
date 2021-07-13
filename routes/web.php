<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';


Route::resource('/admin', AdminController::class)->names('admin');

Route::resource('/categories', CategoriesController::class)->names('admin.categories');

Route::resource('/products', ProductsController::class)->names('admin.products');

Route::resource('/orders', OrderController::class)->names('admin.orders');



Route::get('/prodducts/{id?}', [App\Http\Controllers\ProductsController::class,'index'])->name('products');

Route::get('/product/{id?}', [App\Http\Controllers\ShowController::class,'show'])->name('product');

Route::post('/order/add-to-cart', [App\Http\Controllers\OrderController::class,'addToCart'])->name('order/add-to-cart');


