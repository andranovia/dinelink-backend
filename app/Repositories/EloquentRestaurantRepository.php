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
}
