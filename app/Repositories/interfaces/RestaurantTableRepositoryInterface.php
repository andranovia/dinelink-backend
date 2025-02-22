<?php

namespace App\Repositories\Interfaces;

interface RestaurantTableRepositoryInterface
{
    public function getRestaurantTables(int $restaurantId);

    public function userTables(int $restaurantId, int $userId);

    public function store(int $restaurantId, array $data);

    public function updateUserTable(int $restaurantId, int $userId, array $data);
}
