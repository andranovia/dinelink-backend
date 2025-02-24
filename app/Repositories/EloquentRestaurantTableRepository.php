<?php

namespace App\Repositories;

use App\Models\Floor;
use App\Models\Restaurant;
use App\Models\Table;
use App\Repositories\Interfaces\RestaurantTableRepositoryInterface;

class EloquentRestaurantTableRepository implements RestaurantTableRepositoryInterface
{
    public function getRestaurantTables(int $restaurantId)
    {
        return Restaurant::find($restaurantId)->tables;
    }

    public function postFloor(int $restaurantId, int $number)
    {
        return Restaurant::find($restaurantId)->floors()->create(['number' => $number]);
    }

    public function deleteFloor(int $restaurantId, int $floorId)
    {
        return Floor::where('restaurant_id', $restaurantId)->where('id', $floorId)->delete();
    }

    public function editFloor(int $restaurantId, int $floorId, int $number)
    {
        return Floor::where('restaurant_id', $restaurantId)->where('id', $floorId)->update(['number' => $number]);
    }

    public function editTable(int $restaurantId, int $tableId, array $data)
    {
        return Restaurant::find($restaurantId)->tables()->where('id', $tableId)->update($data);
    }

    public function cancelUserTable(int $restaurantId, int $userId, int $tableId)
    {
        return Restaurant::find($restaurantId)->tables()->where('id', $tableId)->update(['user_id' => null]);
    }

    public function index(int $restaurantId)
    {
        return Restaurant::find($restaurantId)->tables;
    }

    public function getFloor(int $restaurantId)
    {
        return Restaurant::find($restaurantId)->floors;
    }

    public function userTables(int $restaurantId, int $userId)
    {
        return Restaurant::find($restaurantId)->tables()->where('user_id', $userId)->get();
    }

    public function store(int $restaurantId, array $data)
    {
        $restaurant = Restaurant::find($restaurantId);
        return $restaurant->tables()->where('floor_id', $data['floor_id'])->create($data);
    }

    public function updateUserTable(int $restaurantId, int $userId, array $data)
    {
        return Restaurant::find($restaurantId)->tables()->where('id', $data['id'])->update($data, ['user_id' => $userId]);
    }
}
