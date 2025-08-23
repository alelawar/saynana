<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Voucher;
use App\Models\userVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // USER
        $total_users = User::count();
        $revenue_user = Order::whereNotNull('user_id')
            ->where('status', 'success')
            ->sum('total_price');
        $total_user_voucher = userVoucher::count();
        $total_voucher = Voucher::count();

        $vouchers = Voucher::withCount(['orders as uses'])
            ->with('owner')
            ->paginate(10);

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $users = User::selectRaw('DAY(created_at) as day, COUNT(*) as total')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('day')
            ->pluck('total', 'day'); // hasil: [1 => 2, 5 => 3, 7 => 1, ...]


        $daysInMonth = Carbon::now()->daysInMonth;
        $labels = range(1, $daysInMonth);
        $data = [];

        foreach ($labels as $day) {
            $data[] = $users[$day] ?? 0;
        }

        // dd($vouchers->toArray());

        return view("dashboard.users-voucher.index", [
            'total_user' => $total_users,
            'revenue_user' => $revenue_user,
            'total_user_voucher' => $total_user_voucher,
            'total_voucher' => $total_voucher,
            'labels' => $labels,
            'data' => $data,
            'vouchers' => $vouchers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $total_order = Order::where('user_id', $user->id)->count();
        $total_revenue = Order::where('user_id', $user->id)->sum('total_price');
        $total_voucher = userVoucher::where('user_id', $user->id)->count();
        $orders = Order::where('user_id', $user->id)->paginate(5);
        $vouchers = userVoucher::where('user_id', $user->id)
            ->with('voucher')->paginate(5);

        return view('dashboard.users-voucher.edit-user-detail', compact('user', 'total_order', 'total_revenue', 'total_voucher', 'orders', 'vouchers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
