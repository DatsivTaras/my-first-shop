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

Route::post('/status', [App\Http\Controllers\admin\OrderController::class,'status'])->name('admin.status');




Route::get('/prodducts/{id?}', [App\Http\Controllers\ProductsController::class,'index'])->name('products');

Route::get('/product/{id?}', [App\Http\Controllers\ShowController::class,'show'])->name('product');

Route::post('/order/add-to-cart', [App\Http\Controllers\OrderController::class,'addToCart'])->name('order/add-to-cart');

Route::post('/order/delete', [App\Http\Controllers\OrderController::class,'deleteProduct'])->name('order/delete');

Route::post('/makingAnOrder', [App\Http\Controllers\OrderController::class,'makingAnOrder'])->name('makingAnOrder');

Route::get('/cart', [App\Http\Controllers\OrderController::class,'cart'])->name('cart');

Route::get('/profile', [App\Http\Controllers\ProfileController::class,'index'])->name('profile');

Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class,'edit'])->name('profile.edit');

Route::post('/profile/update', [App\Http\Controllers\ProfileController::class,'update'])->name('profile.update');

Route::get('/profile/my-orders', [App\Http\Controllers\OrderController::class,'myOrders'])->name('profile.my-orders');


