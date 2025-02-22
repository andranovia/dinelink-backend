<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(int $restaurantId)
    {
        return $this->productRepository->index($restaurantId);
    }

    public function byCategory(int $restaurantId, int $categoryId)
    {
        return $this->productRepository->byCategory($restaurantId, $categoryId);
    }

    public function categories(int $restaurantId)
    {
        return $this->productRepository->categories($restaurantId);
    }
}
