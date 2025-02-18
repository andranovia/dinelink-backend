<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantTableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('checkout', [PaymentController::class, 'postCheckout']);
    Route::get('checkout/{sessionId}', [PaymentController::class, 'getCheckout']);
    Route::get('/cart', [CartController::class, 'getUserCart']);
    Route::post('/cart', [CartController::class, 'postUserCart']);
    Route::put('/cart', [CartController::class, 'editUserCart']);
    Route::delete('/cart', [CartController::class, 'deleteUserCart']);
    Route::get('/table', [RestaurantTableController::class, 'getRestaurantTable']);
    Route::get('/table/user', [RestaurantTableController::class, 'getRestaurantTablesByUserId']);
    Route::put('/table/user', [RestaurantTableController::class, 'editUserRestaurantTable']);
    Route::post('/table', [RestaurantTableController::class, 'postRestaurantTable']);
    Route::get('/restaurants', [RestaurantController::class, 'getRestaurants']);
    Route::get('/products', [ProductController::class, 'getProducts']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
