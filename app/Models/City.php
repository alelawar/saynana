<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [
        'id'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function dataOrders()
    {
        return $this->hasMany(DataOrder::class);
    }
}
