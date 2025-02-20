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

    public function getRestaurantByOwner(int $userId)
    {
        return Restaurant::where('user_id', $userId)->first();
    }

    public function getRestaurantByCode(string $code)
    {
        return Restaurant::where('code', $code)->first();
    }
}
