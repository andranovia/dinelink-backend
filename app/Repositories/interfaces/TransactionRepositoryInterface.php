<?php

namespace App\Repositories\Interfaces;

interface TransactionRepositoryInterface
{
    public function index(int $userId, int $restaurantId);
    public function updateStatus(string $orderId, string $status);
    public function getRestaurantTransactions(int $restaurantId);
    public function updateTransaction(int $transactionId, string $paymentUrl);
    public function postTransaction(array $data);
}
