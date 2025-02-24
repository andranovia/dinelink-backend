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

    public function cancelUserTable(int $restaurantId, int $userId, int $tableId)
    {
        return $this->restaurantTableRepository->cancelUserTable($restaurantId, $userId, $tableId);
    }

    public function postFloor(int $restaurantId, int $number)
    {
        return $this->restaurantTableRepository->postFloor($restaurantId, $number);
    }

    public function deleteFloor(int $restaurantId, int $floorId)
    {
        return $this->restaurantTableRepository->deleteFloor($restaurantId, $floorId);
    }

    public function editFloor(int $restaurantId, int $floorId, int $number)
    {
        return $this->restaurantTableRepository->editFloor($restaurantId, $floorId, $number);
    }

    public function editTable(int $restaurantId, int $tableId, array $data)
    {
        return $this->restaurantTableRepository->editTable($restaurantId, $tableId, $data);
    }

    public function getFloor(int $restaurantId)
    {
        return $this->restaurantTableRepository->getFloor($restaurantId);
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
