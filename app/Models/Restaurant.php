<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable = [
        'name',
        'user_id',
        'email',
        'code',
        'open',
        'img',
        'phone_number',
        'rating',
        'address',
        'logo',
    ];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'restaurant_id', 'id');
    }

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
