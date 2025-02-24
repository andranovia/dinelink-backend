<?php

namespace App\Services;

use App\Repositories\Interfaces\RestaurantRepositoryInterface;

class RestaurantService
{
    protected $restaurantRepository;

    public function __construct(RestaurantRepositoryInterface $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    public function getAllRestaurants()
    {
        return $this->restaurantRepository->getAllRestaurants();
    }

    public function rating(int $restaurantId)
    {
        return $this->restaurantRepository->rating($restaurantId);
    }

    public function ratingToggle(int $ratingId, int $show)
    {
        return $this->restaurantRepository->ratingToggle($ratingId, $show);
    }

    public function restaurantStatus(int $restaurantId)
    {
        return $this->restaurantRepository->restaurantStatus($restaurantId);
    }

    public function postRating(array $data)
    {
        return $this->restaurantRepository->postRating($data);
    }

    public function restaurantCategories(int $restaurantId)
    {
        return $this->restaurantRepository->restaurantCategories($restaurantId);
    }

    public function postRestaurantCategory(array $data)
    {
        return $this->restaurantRepository->postRestaurantCategory($data);
    }

    public function findByCode(string $code)
    {
        return $this->restaurantRepository->findByCode($code);
    }

    public function sales(int $restaurantId)
    {
        return $this->restaurantRepository->sales($restaurantId);
    }

    public function findByOwner(int $id)
    {
        return $this->restaurantRepository->findByOwner($id);
    }

    public function editRestaurant(array $data, int $id)
    {
        return $this->restaurantRepository->editRestaurant($data, $id);
    }
}
