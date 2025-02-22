<?php

namespace App\Repositories\Interfaces;

interface RestaurantRepositoryInterface
{
    public function getAllRestaurants();

    public function findByOwner(int $userId);

    public function findByCode(string $code);

    public function sales(int $restaurantId);
}
