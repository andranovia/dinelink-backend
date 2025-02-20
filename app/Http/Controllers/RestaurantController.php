<?php

namespace App\Http\Controllers;

use App\Services\RestaurantService;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    protected $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    public function getRestaurants()
    {
        $restaurants = $this->restaurantService->getAllRestaurants();

        return response()->json([
            'restaurants' => $restaurants
        ], 200);
    }

    public function getRestaurantByCode(Request $request)
    {
        $code = $request->code;
        $restaurant = $this->restaurantService->getRestaurantByCode($code);

        return response()->json([
            'restaurant' => $restaurant
        ], 200);
    }

    public function getRestaurantByOwner(Request $request)
    {
        $userId = $request->user_id;
        $restaurant = $this->restaurantService->getRestaurantByOwner($userId);

        return response()->json([
            'restaurant' => $restaurant
        ], 200);
    }
}
