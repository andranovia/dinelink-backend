<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index(Request $request)
    {
        return $this->transactionService->index($request->userId, $request->restaurantId);
    }

    public function updateStatus(Request $request)
    {
        return $this->transactionService->updateStatus($request->orderId, $request->status);
    }

    public function getRestaurantTransactions(Request $request)
    {
        return $this->transactionService->getRestaurantTransactions($request->restaurantId);
    }
}
