<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userVoucher extends Model
{
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voucher() 
    {
        return $this->belongsTo(Voucher::class);
    }
}
