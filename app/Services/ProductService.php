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

    public function store(array $data, string $imagePath)
    {
        return $this->productRepository->store($data, $imagePath);
    }

    public function update(array $data, int $product_id)
    {
        return $this->productRepository->update($data, $product_id);
    }

    public function delete(int $id)
    {
        return $this->productRepository->delete($id);
    }

    public function status(int $id)
    {
        return $this->productRepository->status($id);
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
