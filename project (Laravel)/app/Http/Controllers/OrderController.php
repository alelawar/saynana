<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil awal dan akhir bulan sekarang
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // ambil jumlah order per tanggal
        $orders = Order::selectRaw('DAY(created_at) as day, COUNT(*) as total')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->whereNotIn('status', ['pending'])
            ->groupBy('day')
            ->pluck('total', 'day');

        // ambil total harga per tanggal
        $totals = Order::selectRaw('DAY(created_at) as day, SUM(total_price) as total')
            ->whereBetween('updated_at', [$startOfMonth, $endOfMonth])
            ->where('status', 'success')
            ->groupBy('day')
            ->pluck('total', 'day');


        // bikin array tanggal sesuai jumlah hari di bulan ini
        $daysInMonth = Carbon::now()->daysInMonth;
        $labels = range(1, $daysInMonth);

        $dataOrder = [];
        $dataTotals = [];
        foreach ($labels as $day) {
            $dataOrder[] = $orders[$day] ?? 0;
            $dataTotals[] = $totals[$day] ?? 0;
        }

        $total_order = Order::whereNotIn('status', ['pending'])->count();
        $total_revenue = Order::where('status', 'success')->sum('total_price');
        $total_canceled = Order::where('status', 'canceled')->count();

        return view("dashboard.order", [
            'labels' => $labels, // sekarang labelnya angka tanggal
            'data' => $dataOrder,
            'dataTotals' => $dataTotals,
            'total_order' => $total_order,
            'total_revenue' => $total_revenue,
            'total_canceled'=> $total_canceled,
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
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('dashboard.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect('/dashboard/orders?status=success')->with('success', 'Order berhasil dihapus.');
    }
}
