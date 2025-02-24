<?php

namespace App\Repositories\Interfaces;

interface RestaurantTableRepositoryInterface
{
    public function getRestaurantTables(int $restaurantId);

    public function index(int $restaurantId);

    public function postFloor(int $restaurantId, int $number);

    public function cancelUserTable(int $restaurantId, int $userId, int $tableId);

    public function deleteFloor(int $restaurantId, int $floorId);

    public function editFloor(int $restaurantId, int $floorId, int $number);

    public function editTable(int $restaurantId, int $tableId, array $data);

    public function getFloor(int $restaurantId);

    public function userTables(int $restaurantId, int $userId);

    public function store(int $restaurantId, array $data);

    public function updateUserTable(int $restaurantId, int $userId, array $data);
}
