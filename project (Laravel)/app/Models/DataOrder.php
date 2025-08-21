<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataOrder extends Model
{
    protected $guarded = [
        'id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
