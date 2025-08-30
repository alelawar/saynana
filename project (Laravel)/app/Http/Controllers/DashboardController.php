<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\userVoucher;
use App\Models\Voucher;
use App\Models\OrdersItem;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashboardController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorize('seller');
    }


    public function index()
    {
        // ORDERAN PRODUK
        $total_order = Order::where('status', 'paid')->count();
        $total_selled_product = OrdersItem::whereHas('order', function ($q) {
            $q->where('status', 'success'); // status sesuai sistem lo
        })->sum('qty');
        $order_packed = Order::where('status', 'packing')->count();
        $order_shiped = Order::where('status', 'shipping')->count();
        $order_canceled = Order::where('status', 'canceled')->count();
        $order_successed = Order::where('status', 'success')->count();
       
        // STOCK AND VOUCHER
        $product_stock = Product::sum('stock');
        $product_out_sotock = Product::where('stock', 0)->count();
        $product_low_sotock = Product::where('stock', 5)->count();
        $total_voucher = Voucher::count();
        $total_user_voucher = UserVoucher::count();

        // USER
        $total_users = User::count();

        // FINANCE
        $total_revenue = Order::where('status', 'success')->sum('total_price');
        // dd($order);
        return view("dashboard.index", compact('total_order', 'total_users', 'total_revenue', 'total_selled_product', 'product_out_sotock', 'order_packed', 'order_canceled', 'product_stock', 'product_low_sotock', 'total_voucher', 'total_user_voucher', 'order_shiped', 'order_successed'));
    }
}
