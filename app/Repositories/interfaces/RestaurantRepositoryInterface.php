<?php

namespace App\Repositories\Interfaces;

interface RestaurantRepositoryInterface
{
    public function getAllRestaurants();

    public function getRestaurantByOwner(int $userId);

    public function getRestaurantByCode(string $code);
}
