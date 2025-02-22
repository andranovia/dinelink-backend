<?php

namespace App\Repositories\Interfaces;

interface CartRepositoryInterface
{
    public function index(int $userId);

    public function store(int $userId, array $data);

    public function update(int $userId, int $productId, array $data);

    public function destroy(int $userId, int $productId);
}
