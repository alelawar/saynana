<?php

namespace App\Models;

use App\Models\OrdersItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [
        'id'
    ];

    public function items()
    {
        return $this->hasMany(OrdersItem::class);
    }

    public function dataOrder()
    {
        return $this->hasOne(DataOrder::class, 'order_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
