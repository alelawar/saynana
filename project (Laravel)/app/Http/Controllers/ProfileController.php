<?php

namespace App\Http\Controllers;

use App\Models\userVoucher;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $orders = $user->order()
            ->with('items.product')
            ->whereNotIn('status', ['pending'])
            ->paginate(10);
        $vouchers = UserVoucher::where('user_id', $user->id)->first() ?? null;

        // dd($vouchers);

        return view("profile.index", compact("user", "orders", "vouchers"));
    }
}
