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

    public function index()
    {
        $restaurants = $this->restaurantService->getAllRestaurants();

        return response()->json([
            'restaurants' => $restaurants
        ], 200);
    }

    public function findByCode(Request $request)
    {
        $code = $request->code;
        $restaurant = $this->restaurantService->findByCode($code);

        return response()->json([
            'restaurant' => $restaurant
        ], 200);
    }

    public function sales(Request $request)
    {
        $restaurantId = $request->restaurant_id;
        $restaurantSalesData = $this->restaurantService->sales($restaurantId);

        return response()->json([
            'restaurant_sales_data' => $restaurantSalesData
        ], 200);
    }

    public function findByOwner(Request $request)
    {
        $userId = $request->user_id;
        $restaurant = $this->restaurantService->findByOwner($userId);

        return response()->json([
            'restaurant' => $restaurant
        ], 200);
    }
}
