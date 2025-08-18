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
        $vouchers = userVoucher::findOrFail($user->id);

        // dd($vouchers);

        return view("profile.index", compact("user", "orders", "vouchers"));
    }
}
