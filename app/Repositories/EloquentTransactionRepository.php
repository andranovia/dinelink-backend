<?php

namespace App\Repositories;

use App\Models\Restaurant;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class EloquentTransactionRepository implements TransactionRepositoryInterface
{
    public function index(int $userId, int $restaurantId)
    {
        return Transaction::where('user_id', $userId)
            ->where('restaurant_id', $restaurantId)
            ->where(function ($query) {
                $query->where('status', 'Pending Payment')
                    ->orWhere('status', 'Pending Confirmation');
            })
            ->first();
    }

    public function updateStatus(string $orderId, string $status)
    {
        $transaction = Transaction::where('order_id', $orderId)->first();
        $transaction->status = $status;
        $transaction->save();
        return $transaction;
    }

    public function getUserTransactions(int $userId)
    {
        $transactions = Transaction::where('user_id', $userId)->get();

        foreach ($transactions as $transaction) {
            $transaction['restaurant'] = Restaurant::find($transaction->restaurant_id);
            $transaction['user'] = User::find($transaction->user_id);
        }

        return $transactions;
    }

    public function findByRestaurant(int $restaurantId)
    {
        $transactions = Transaction::where('restaurant_id', $restaurantId)->get();

        foreach ($transactions as $transaction) {
            $transaction['user'] = User::find($transaction->user_id);
        }

        return $transactions;
    }

    public function postTransaction(array $data)
    {
        return Transaction::create([
            'order_id' => $data['order_id'],
            'items' => $data['items'],
            'user_id' => $data['user_id'],
            'restaurant_id' => $data['restaurant_id'],
            'status' => $data['status'],
            'total' => $data['total'],
            'subtotal' => $data['subtotal'],
            'tax' => $data['tax'],
        ]);
    }

    public function updateTransaction(int $transactionId, string $paymentUrl)
    {
        $transaction = Transaction::find($transactionId);
        $transaction->payment_url = $paymentUrl;
        $transaction->save();
        return $transaction;
    }
}
