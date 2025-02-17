<?php

namespace App\Repositories\Interfaces;

interface CartRepositoryInterface
{
    public function getUserCart(int $userId);

    public function postUserCart(int $userId, array $data);

    public function editUserCart(int $userId, int $productId, array $data);

    public function deleteUserCart(int $userId, int $productId);
}
