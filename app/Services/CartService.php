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

    public function getUserCart(int $userId)
    {
        return $this->cartRepository->getUserCart($userId);
    }

    public function postUserCart(int $userId, array $data)
    {
        return $this->cartRepository->postUserCart($userId, $data);
    }

    public function editUserCart(int $userId, int $productId, array $data)
    {
        return $this->cartRepository->editUserCart($userId, $productId, $data);
    }

    public function deleteUserCart(int $userId, int $productId)
    {
        return $this->cartRepository->deleteUserCart($userId, $productId);
    }
}
