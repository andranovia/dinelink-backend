<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';

    protected $fillable = [
        'floor_id',
        'number',
        'seats',
        'notes',
        'persons',
        'is_active',
        'restaurant_id',
        'user_id',
    ];

    protected $casts = [
        'number' => 'integer',
        'floor_id' => 'integer',
        'seats' => 'integer',
        'is_active' => 'boolean',
        'restaurant_id' => 'integer',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
}
