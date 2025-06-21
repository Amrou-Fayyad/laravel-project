<?php

use App\Http\Controllers\AddressesController;
use App\Http\Controllers\Cart_itemsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Order_itemsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('users')->group(function(){
    Route::get('index',[UsersController::class,'index'])->name('users.index');
    Route::get('create',[UsersController::class,'create'])->name('users.create');
    Route::post('store',[UsersController::class,'store'])->name('users.store');
    Route::get('edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('update/{id}',[UsersController::class,'update'])->name('users.update');
    Route::get('delete/{id}',[UsersController::class,'delete'])->name('users.delete');
});

Route::prefix('categories')->group(function(){
    Route::get('index',[CategoriesController::class,'index'])->name('categories.index');
    Route::get('create',[CategoriesController::class,'create'])->name('categories.create');
    Route::post('store',[CategoriesController::class,'store'])->name('categories.store');
    Route::get('edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('update/{id}',[CategoriesController::class,'update'])->name('categories.update');
    Route::get('delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');
});

Route::prefix('products')->group(function(){
    Route::get('index',[ProductsController::class,'index'])->name('products.index');
    Route::get('create',[ProductsController::class,'create'])->name('products.create');
    Route::post('store',[ProductsController::class,'store'])->name('products.store');
    Route::get('edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('update/{id}',[ProductsController::class,'update'])->name('products.update');
    Route::get('delete/{id}',[ProductsController::class,'delete'])->name('products.delete');
});

Route::prefix('orders')->group(function(){
    Route::get('index',[OrdersController::class,'index'])->name('orders.index');
    Route::get('create',[OrdersController::class,'create'])->name('orders.create');
    Route::post('store',[OrdersController::class,'store'])->name('orders.store');
    Route::get('edit/{id}', [OrdersController::class, 'edit'])->name('orders.edit');
    Route::put('update/{id}',[OrdersController::class,'update'])->name('orders.update');
    Route::get('delete/{id}',[OrdersController::class,'delete'])->name('orders.delete');
});

Route::prefix('order_items')->group(function(){
    Route::get('index',[Order_itemsController::class,'index'])->name('order_items.index');
    Route::get('create',[Order_itemsController::class,'create'])->name('order_items.create');
    Route::post('store',[Order_itemsController::class,'store'])->name('order_items.store');
    Route::get('edit/{id}', [Order_itemsController::class, 'edit'])->name('order_items.edit');
    Route::put('update/{id}',[Order_itemsController::class,'update'])->name('order_items.update');
    Route::get('delete/{id}',[Order_itemsController::class,'delete'])->name('order_items.delete');
});

Route::prefix('addresses')->group(function(){
    Route::get('index',[AddressesController::class,'index'])->name('addresses.index');
    Route::get('create',[AddressesController::class,'create'])->name('addresses.create');
    Route::post('store',[AddressesController::class,'store'])->name('addresses.store');
    Route::get('edit/{id}', [AddressesController::class, 'edit'])->name('addresses.edit');
    Route::put('update/{id}',[AddressesController::class,'update'])->name('addresses.update');
    Route::get('delete/{id}',[AddressesController::class,'delete'])->name('addresses.delete');
});

Route::prefix('reviews')->group(function(){
    Route::get('index',[ReviewsController::class,'index'])->name('reviews.index');
    Route::get('create',[ReviewsController::class,'create'])->name('reviews.create');
    Route::post('store',[ReviewsController::class,'store'])->name('reviews.store');
    Route::get('edit/{id}', [ReviewsController::class, 'edit'])->name('reviews.edit');
    Route::put('update/{id}',[ReviewsController::class,'update'])->name('reviews.update');
    Route::get('delete/{id}',[ReviewsController::class,'delete'])->name('reviews.delete');
});

Route::prefix('carts')->group(function(){
    Route::get('index',[CartsController::class,'index'])->name('carts.index');
    Route::get('delete/{id}',[CartsController::class,'delete'])->name('carts.delete');
});

Route::prefix('cart_items')->group(function(){
    Route::get('index',[Cart_itemsController::class,'index'])->name('cart_items.index');
    Route::get('create',[Cart_itemsController::class,'create'])->name('cart_items.create');
    Route::post('store',[Cart_itemsController::class,'store'])->name('cart_items.store');
    Route::get('edit/{id}', [Cart_itemsController::class, 'edit'])->name('cart_items.edit');
    Route::put('update/{id}',[Cart_itemsController::class,'update'])->name('cart_items.update');
    Route::get('delete/{id}',[Cart_itemsController::class,'delete'])->name('cart_items.delete');
});
require __DIR__.'/auth.php';
