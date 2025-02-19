<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class EloquentTransactionRepository implements TransactionRepositoryInterface
{
    public function getUserTransactions(int $userId, int $restaurantId)
    {
        return Transaction::where('user_id', $userId)->where('restaurant_id', $restaurantId)->first();
    }

    public function postTransaction(array $data)
    {
        return Transaction::create([
            'order_id' => $data['order_id'],
            'items' => $data['items'],
            'user_id' => $data['user_id'],
            'restaurant_id' => $data['restaurant_id'],
            'status' => $data['status'],
            'payment_url' => $data['payment_url'],
            'total' => $data['total'],
            'subtotal' => $data['subtotal'],
            'tax' => $data['tax'],
        ]);
    }
}
