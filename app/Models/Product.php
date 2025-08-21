<?php

namespace App\Models;

use App\Models\OrdersItem;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [
        'id'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrdersItem::class); // relasi ke order_items
    }
    
}
