<?php

namespace App\Repositories;

use App\Models\Restaurant;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;

class EloquentRestaurantRepository implements RestaurantRepositoryInterface
{
    public function getAllRestaurants()
    {
        return Restaurant::all();
    }

    public function findByOwner(int $userId)
    {
        return Restaurant::where('user_id', $userId)->first();
    }

    public function findByCode(string $code)
    {
        return Restaurant::where('code', $code)->first();
    }

    public function sales(int $restaurantId)
    {
        $restaurantData = Restaurant::find($restaurantId)->transactions()->get();

        $restaurantSalesData = [
            'total_sales' => 0,
            'total_orders' => 0,
            'total_customers' => 0,
        ];

        foreach ($restaurantData as $transaction) {
            $restaurantSalesData['total_sales'] += $transaction->subtotal;
            $restaurantSalesData['total_orders'] += 1;
            $restaurantSalesData['total_customers'] += 1;
        }

        return $restaurantSalesData;
    }
}
