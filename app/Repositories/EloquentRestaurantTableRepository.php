<?php

namespace App\Repositories;

use App\Models\Restaurant;
use App\Repositories\Interfaces\RestaurantTableRepositoryInterface;

class EloquentRestaurantTableRepository implements RestaurantTableRepositoryInterface
{
    public function getRestaurantTables(int $restaurantId)
    {
        return Restaurant::find($restaurantId)->tables;
    }

    public function getRestaurantTablesByUserId(int $restaurantId, int $userId)
    {
        return Restaurant::find($restaurantId)->tables()->where('user_id', $userId)->get();
    }

    public function postRestaurantTable(int $restaurantId, array $data)
    {
        return Restaurant::find($restaurantId)->tables()->create($data);
    }

    public function editUserRestaurantTable(int $restaurantId, int $userId, array $data)
    {
        return Restaurant::find($restaurantId)->tables()->where('id', $data['id'])->update($data, ['user_id' => $userId]);
    }
}
