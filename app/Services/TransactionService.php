<?php

namespace App\Services;

use App\Repositories\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Str;

class TransactionService
{
    protected $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function getUserTransactions(int $userId)
    {
        return $this->transactionRepository->getUserTransactions($userId);
    }

    public function updateStatus(string $orderId, string $status)
    {
        return $this->transactionRepository->updateStatus($orderId, $status);
    }

    public function index(int $userId, $restaurantId)
    {
        return $this->transactionRepository->index($userId, $restaurantId);
    }

    public function findByRestaurant(int $restaurantId)
    {
        return $this->transactionRepository->findByRestaurant($restaurantId);
    }

    public function postTransaction(array $data)
    {

        $data['order_id'] = Str::uuid();

        return $this->transactionRepository->postTransaction($data);
    }

    public function updateTransaction(int $transactionId, string $paymentUrl)
    {
        return $this->transactionRepository->updateTransaction($transactionId, $paymentUrl);
    }
}
