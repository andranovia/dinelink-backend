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

    public function categories(Request $request)
    {
        $restaurantId = $request->restaurant_id;
        $categories = $this->restaurantService->restaurantCategories($restaurantId);

        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function rating(Request $request)
    {
        $restaurantId = $request->restaurant_id;
        $rating = $this->restaurantService->rating($restaurantId);

        return response()->json([
            'rating' => $rating
        ], 200);
    }

    public function ratingToggle(Request $request)
    {
        $ratingId = $request->id;
        $show = $request->show;
        $rating = $this->restaurantService->ratingToggle($ratingId, $show);

        return response()->json([
            'rating' => $rating
        ], 200);
    }

    public function restaurantStatus(Request $request)
    {
        $restaurantId = $request->restaurant_id;
        $status = $this->restaurantService->restaurantStatus($restaurantId);

        return response()->json([
            'status' => $status
        ], 200);
    }

    public function postRating(Request $request)
    {
        $data = $request->all();
        $rating = $this->restaurantService->postRating($data);

        return response()->json([
            'rating' => $rating
        ], 200);
    }

    public function postCategory(Request $request)
    {
        $data = $request->data;
        $category = $this->restaurantService->postRestaurantCategory($data);

        return response()->json([
            'category' => $category
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

    public function editRestaurant(Request $request)
    {
        $data = $request->data;
        $restaurantId = $request->restaurant_id;
        $restaurant = $this->restaurantService->editRestaurant($data, $restaurantId);

        return response()->json([
            'restaurant' => $restaurant
        ], 200);
    }
}
