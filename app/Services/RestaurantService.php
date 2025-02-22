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

    public function findByCode(string $code)
    {
        return $this->restaurantRepository->findByCode($code);
    }

    public function sales(int $restaurantId)
    {
        return $this->restaurantRepository->sales($restaurantId);
    }

    public function findByOwner(int $id)
    {
        return $this->restaurantRepository->findByOwner($id);
    }
}
