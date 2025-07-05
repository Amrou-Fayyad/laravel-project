<?php

use App\Http\Controllers\Api\AddressesController;
use App\Http\Controllers\Api\Cart_itemsController;
use App\Http\Controllers\Api\CartsController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\Order_itemsController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\ReviewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Public routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/{id}/users', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);

    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::get('/{id}/categories', [CategoriesController::class, 'show']);
    Route::post('/categories', [CategoriesController::class, 'store']);
    Route::put('/categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);


    Route::get('/products', [ProductsController::class, 'index']);
    Route::get('/{id}/products', [ProductsController::class, 'show']);
    Route::post('/products', [ProductsController::class, 'store']);
    Route::put('/products/{id}', [ProductsController::class, 'update']);
    Route::delete('/products/{id}', [ProductsController::class, 'destroy']);


    Route::get('/orders', [OrdersController::class, 'index']);
    Route::get('/{id}/orders', [OrdersController::class, 'show']);
    Route::post('/orders', [OrdersController::class, 'store']);
    Route::put('/orders/{id}', [OrdersController::class, 'update']);
    Route::delete('/orders/{id}', [OrdersController::class, 'destroy']);


    Route::get('/order_items', [Order_itemsController::class, 'index']);
    Route::get('/{id}/order_items', [Order_itemsController::class, 'show']);
    Route::post('/order_items', [Order_itemsController::class, 'store']);
    Route::put('/order_items/{id}', [Order_itemsController::class, 'update']);
    Route::delete('/order_items/{id}', [Order_itemsController::class, 'destroy']);


    Route::get('/addresses', [AddressesController::class, 'index']);
    Route::get('/{id}/addresses', [AddressesController::class, 'show']);
    Route::post('/addresses', [AddressesController::class, 'store']);
    Route::put('/addresses/{id}', [AddressesController::class, 'update']);
    Route::delete('/addresses/{id}', [AddressesController::class, 'destroy']);

    Route::get('/reviews', [ReviewsController::class, 'index']);
    Route::get('/{id}/reviews', [ReviewsController::class, 'show']);
    Route::post('/reviews', [ReviewsController::class, 'store']);
    Route::put('/reviews/{id}', [ReviewsController::class, 'update']);
    Route::delete('/reviews/{id}', [ReviewsController::class, 'destroy']);

    Route::get('/carts', [CartsController::class, 'index']);
    Route::get('/{id}/carts', [CartsController::class, 'show']);
    Route::delete('/carts/{id}', [CartsController::class, 'destroy']);


    Route::get('/cart_items', [Cart_itemsController::class, 'index']);
    Route::get('/{id}/cart_items', [Cart_itemsController::class, 'show']);
    Route::post('/cart_items', [Cart_itemsController::class, 'store']);
    Route::put('/cart_items/{id}', [Cart_itemsController::class, 'update']);
    Route::delete('/cart_items/{id}', [Cart_itemsController::class, 'destroy']);
});

