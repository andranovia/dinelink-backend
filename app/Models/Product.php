<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'available',
        'restaurant_id',
        'category_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}
