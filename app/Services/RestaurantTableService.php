<?php

namespace App\Services;

use App\Repositories\Interfaces\RestaurantTableRepositoryInterface;

class RestaurantTableService
{
    protected $restaurantTableRepository;

    public function __construct(RestaurantTableRepositoryInterface $restaurantTableRepository)
    {
        $this->restaurantTableRepository = $restaurantTableRepository;
    }

    public function getRestaurantTable(int $restaurantId)
    {
        return $this->restaurantTableRepository->getRestaurantTables($restaurantId);
    }

    public function getRestaurantTablesByUserId(int $restaurantId, int $userId)
    {
        return $this->restaurantTableRepository->getRestaurantTablesByUserId($restaurantId, $userId);
    }

    public function postRestaurantTable(int $restaurantId, array $data)
    {
        return $this->restaurantTableRepository->postRestaurantTable($restaurantId, $data);
    }

    public function editUserRestaurantTable(int $restaurantId, int $userId, array $data)
    {
        return $this->restaurantTableRepository->editUserRestaurantTable($restaurantId, $userId, $data);
    }
}
