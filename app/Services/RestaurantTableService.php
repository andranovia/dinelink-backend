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

    public function index(int $restaurantId)
    {
        return $this->restaurantTableRepository->getRestaurantTables($restaurantId);
    }

    public function userTables(int $restaurantId, int $userId)
    {
        return $this->restaurantTableRepository->userTables($restaurantId, $userId);
    }

    public function store(int $restaurantId, array $data)
    {
        return $this->restaurantTableRepository->store($restaurantId, $data);
    }

    public function updateUserTable(int $restaurantId, int $userId, array $data)
    {
        return $this->restaurantTableRepository->updateUserTable($restaurantId, $userId, $data);
    }
}
