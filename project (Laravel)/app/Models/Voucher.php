<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $guarded = [
        'id'
    ];

    public function userVouchers()
    {
        return $this->hasMany(UserVoucher::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'voucher_id');
    }

    public function owner()
    {
        return $this->hasOneThrough(User::class, UserVoucher::class, 'voucher_id', 'id', 'id', 'user_id');
    }
}
