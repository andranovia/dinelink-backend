<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function getProducts(int $restaurantId);
}
