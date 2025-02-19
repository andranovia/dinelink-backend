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

    public function getUserTransactions(int $userId, $restaurantId)
    {
        return $this->transactionRepository->getUserTransactions($userId, $restaurantId);
    }

    public function postTransaction(array $data, string $sessionUrl)
    {

        $data['order_id'] = Str::uuid();
        $data['payment_url'] = $sessionUrl;

        return $this->transactionRepository->postTransaction($data);
    }
}
