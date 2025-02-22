<?php

namespace App\Services;

use App\Repositories\Interfaces\CartRepositoryInterface;

class CartService
{
    protected $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function index(int $userId)
    {
        return $this->cartRepository->index($userId);
    }

    public function store(int $userId, array $data)
    {
        return $this->cartRepository->store($userId, $data);
    }

    public function update(int $userId, int $productId, array $data)
    {
        return $this->cartRepository->update($userId, $productId, $data);
    }

    public function destroy(int $userId, int $productId)
    {
        return $this->cartRepository->destroy($userId, $productId);
    }
}
