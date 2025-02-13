<?php

namespace App\Http\Controllers;

use App\Services\RestaurantService;

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
}
