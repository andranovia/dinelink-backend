<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function index(int $restaurantId);

    public function byCategory(int $restaurantId, int $categoryId);

    public function categories(int $restaurantId);
}
