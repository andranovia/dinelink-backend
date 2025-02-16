<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function getProducts(int $restaurantId)
    {
        return Product::where('restaurant_id', $restaurantId)->get();
    }
}
