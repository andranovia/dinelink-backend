<?php

namespace App\Repositories\Interfaces;

interface TransactionRepositoryInterface
{
    public function getUserTransactions(int $userId, int $restaurantId);
    public function postTransaction(array $data);
}
