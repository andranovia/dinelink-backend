<?php

namespace App\Repositories\Interfaces;

interface RestaurantRepositoryInterface
{
    public function getAllRestaurants();

    public function restaurantCategories(int $restaurantId);

    public function postRestaurantCategory(array $data);

    public function rating(int $restaurantId);

    public function ratingToggle(int $ratingId, int $show);

    public function postRating(array $data);

    public function restaurantStatus(int $restaurantId);

    public function findByOwner(int $userId);

    public function editRestaurant(array $data, int $id);

    public function findByCode(string $code);

    public function sales(int $restaurantId);
}
