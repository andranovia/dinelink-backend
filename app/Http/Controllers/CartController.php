<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct(protected CartService $cartService) {}


    public function getUserCart(Request $request)
    {
        if (!$request->has('user_id')) {
            return response()->json(
                [
                    'message' => 'User ID is required'
                ],
                400
            );
        }

        $userId = $request->user_id;
        $cart = $this->cartService->getUserCart($userId);

        return response()->json(
            [
                'cart' => $cart
            ],
            200
        );
    }

    public function postUserCart(Request $request)
    {
        $userId = $request->user_id;
        $data = $request->all();
        $cart = $this->cartService->postUserCart($userId, $data);

        return response()->json(
            $cart,
            201
        );
    }

    public function editUserCart(Request $request)
    {
        $userId = $request->user_id;
        $productId = $request->product_id;
        $data = $request->all();
        $cart = $this->cartService->editUserCart($userId, $productId, $data);

        return response()->json(
            $cart,
            200
        );
    }

    public function deleteUserCart(Request $request)
    {
        $userId = $request->user_id;
        $productId = $request->product_id;
        $cart = $this->cartService->deleteUserCart($userId, $productId);

        return response()->json(
            $cart,
            200
        );
    }
}
