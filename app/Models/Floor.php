<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = [
        'number',
        'restaurant_id',
    ];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
