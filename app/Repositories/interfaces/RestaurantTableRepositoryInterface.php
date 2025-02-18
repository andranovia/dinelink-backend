<?php

namespace App\Repositories\Interfaces;

interface RestaurantTableRepositoryInterface
{
    public function getRestaurantTables(int $restaurantId);

    public function getRestaurantTablesByUserId(int $restaurantId, int $userId);

    public function postRestaurantTable(int $restaurantId, array $data);

    public function editUserRestaurantTable(int $restaurantId, int $userId, array $data);
}
