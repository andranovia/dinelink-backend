<?php

namespace App\Providers;

use App\Models\RestaurantTable;
use App\Repositories\EloquentCartRepository;
use App\Repositories\EloquentProductRepository;
use App\Repositories\EloquentRestaurantRepository;
use App\Repositories\EloquentRestaurantTableRepository;
use App\Repositories\EloquentTransactionRepository;
use App\Repositories\EloquentUserRepository;
use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;
use App\Repositories\Interfaces\RestaurantTableRepositoryInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            EloquentUserRepository::class
        );
        $this->app->bind(
            RestaurantRepositoryInterface::class,
            EloquentRestaurantRepository::class
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class
        );
        $this->app->bind(
            CartRepositoryInterface::class,
            EloquentCartRepository::class
        );
        $this->app->bind(
            RestaurantTableRepositoryInterface::class,
            EloquentRestaurantTableRepository::class
        );
        $this->app->bind(
            TransactionRepositoryInterface::class,
            EloquentTransactionRepository::class
        );
    }


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
