<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_vouchers')->withPivot('is_used')
            ->withTimestamps();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'voucher_id');
    }
}
