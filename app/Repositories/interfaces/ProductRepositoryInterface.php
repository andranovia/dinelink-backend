<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function index(int $restaurantId);

    public function store(array $data, string $imagePath);

    public function update(array $data, int $product_id);

    public function delete(int $id);

    public function status(int $id);

    public function byCategory(int $restaurantId, int $categoryId);

    public function categories(int $restaurantId);
}
