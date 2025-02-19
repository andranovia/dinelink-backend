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

    public function getProducts(int $restaurantId)
    {
        return $this->productRepository->getProducts($restaurantId);
    }

    public function getProductByCategory(int $restaurantId, int $categoryId)
    {
        return $this->productRepository->getProductByCategory($restaurantId, $categoryId);
    }

    public function getAllProductCategories(int $restaurantId)
    {
        return $this->productRepository->getAllProductCategories($restaurantId);
    }
}
