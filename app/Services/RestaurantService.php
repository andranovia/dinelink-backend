<?php

namespace App\Services;

use App\Repositories\Interfaces\RestaurantRepositoryInterface;

class RestaurantService
{
    protected $restaurantRepository;

    public function __construct(RestaurantRepositoryInterface $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    public function getAllRestaurants()
    {
        return $this->restaurantRepository->getAllRestaurants();
    }
}
