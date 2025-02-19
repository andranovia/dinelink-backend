<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function getProducts(int $restaurantId);

    public function getProductByCategory(int $restaurantId, int $categoryId);

    public function getAllProductCategories(int $restaurantId);
}
