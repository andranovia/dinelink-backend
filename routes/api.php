<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantTableController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // User
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('user.profile');

    // Cart
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index']);
        Route::post('/', [CartController::class, 'store']);
        Route::put('/', [CartController::class, 'update']);
        Route::delete('/', [CartController::class, 'destroy']);
    });

    // Checkout
    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/', [PaymentController::class, 'index']);
        Route::post('/', [PaymentController::class, 'store']);
    });

    // Restaurant Tables
    Route::prefix('tables')->name('tables.')->group(function () {
        Route::get('/', [RestaurantTableController::class, 'index']);
        Route::post('/', [RestaurantTableController::class, 'store']);
        Route::put('/cancel', [RestaurantTableController::class, 'cancelUserTable']);
        Route::put('/', [RestaurantTableController::class, 'editTable']);
        Route::delete('/floor', [RestaurantTableController::class, 'deleteFloor']);
        Route::put('/floor', [RestaurantTableController::class, 'editFloor']);
        Route::post('/floor', [RestaurantTableController::class, 'postFloor']);
        Route::get('/floor', [RestaurantTableController::class, 'getFloor']);
        Route::get('/user', [RestaurantTableController::class, 'userTables']);
        Route::put('/user', [RestaurantTableController::class, 'updateUserTable']);
    });

    // Restaurants
    Route::prefix('restaurants')->name('restaurants.')->group(function () {
        Route::get('/', [RestaurantController::class, 'index']);
        Route::put('/status', [RestaurantController::class, 'restaurantStatus']);
        Route::get('/categories', [RestaurantController::class, 'categories']);
        Route::get('/rating', [RestaurantController::class, 'rating']);
        Route::post('/rating', [RestaurantController::class, 'postRating']);
        Route::post('/rating/toggle', [RestaurantController::class, 'ratingToggle']);
        Route::post('/categories', [RestaurantController::class, 'postCategory']);
        Route::put('/edit', [RestaurantController::class, 'editRestaurant']);
        Route::get('/sales', [RestaurantController::class, 'sales']);
        Route::get('/code', [RestaurantController::class, 'findByCode']);
        Route::get('/owner', [RestaurantController::class, 'findByOwner']);
    });

    // Transactions
    Route::prefix('transactions')->name('transactions.')->group(function () {
        Route::get('/', [TransactionController::class, 'index']);
        Route::get('/user', [TransactionController::class, 'getUserTransactions']);
        Route::post('/status', [TransactionController::class, 'updateStatus']);
        Route::get('/restaurant', [TransactionController::class, 'findByRestaurant']);
    });

    // Products
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::post('/', [ProductController::class, 'store']);
        Route::delete('/', [ProductController::class, 'delete']);
        Route::put('/status', [ProductController::class, 'status']);
        Route::put('/{product_id}', [ProductController::class, 'update']);
        Route::get('/category', [ProductController::class, 'byCategory']);
    });

    // Categories
    Route::get('/categories', [ProductController::class, 'categories'])->name('categories.index');
});
