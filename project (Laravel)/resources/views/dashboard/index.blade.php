<x-dashboard.layout title="Dashboard">
    <div class="max-w-7xl mx-auto">
        <div class="mb-8">
            <h1 class=" md:text-xl font-semibold">Ringkasan Pesanan</h1>
            <p class="text-slate-600  md:mb-3 text-xs ">Tugas Yang Perlu Diselesaikan</p>
            <div class="grid md:grid-cols-4 grid-cols-2 p-2 gap-2 text-slate-800">
                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    @if ($total_order)
                        <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full animate-pulse"></span>
                    @endif
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-blue-400 text-xl md:text-2xl">{{$total_order ?? 0}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Total Semua Order Harus Dikirim (Belum Dikemas)
                        </p>
                    </div>
                    <a href="/dashboard/orders" class="text-xs underline hover:text-blue-400">Lanjutkan ></a>
                </div>

                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    @if ($order_packed)
                        <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full animate-pulse"></span>
                    @endif
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-blue-400 text-xl md:text-2xl">{{$order_packed}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Total Semua Order Harus Dikirim (Sudah Dikemas)
                        </p>
                    </div>
                    <a href="/dashboard/orders?status=packing" class="text-xs underline hover:text-blue-400">Lanjutkan ></a>
                </div>
                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-blue-400 text-xl md:text-2xl">{{$order_shiped}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Total Semua Order (Sudah Terkirim)
                        </p>
                    </div>
                    <a href="/dashboard/orders?status=shipping" class="text-xs underline hover:text-blue-400">Lanjutkan ></a>
                </div>
                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-green-400 md:text-2xl">{{$order_successed ?? 0}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Total Semua Order Selesai</p>
                    </div>
                    <a href="/dashboard/orders?status=success" class="text-xs underline hover:text-blue-400">Detail ></a>
                </div>

                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    @if ($order_canceled)
                        <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full animate-pulse"></span>
                    @endif
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-red-500 text-xl md:text-2xl">{{$order_canceled}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Order Dibatalkan</p>
                    </div>
                    <a href="/dashboard/orders?status=canceled" class="text-xs underline hover:text-blue-400">Lanjutkan ></a>
                </div>

            </div>
        </div>
        <div class="mb-8">
            <h1 class=" md:text-xl font-semibold">Ringkasan Stok dan Voucher</h1>
            <p class="text-slate-600  md:mb-3 text-xs ">Data Yang Perlu Diketahui</p>
            <div class="grid md:grid-cols-4 grid-cols-2 p-2 gap-2 text-slate-800">

                <!-- Card 4 -->
                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-blue-400 text-xl md:text-2xl">{{$product_stock ?? 0}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Total Semua Stok Produk
                        </p>
                    </div>
                    <a href="/dashboard/products" class="text-xs underline hover:text-blue-400">Lanjutkan ></a>
                </div>
                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-green-400 text-xl md:text-2xl">{{$total_selled_product ?? 0}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Total Semua Stok Produk Terjual (Selesai)
                        </p>
                    </div>
                    <a href="/dashboard/products" class="text-xs underline hover:text-blue-400">Lanjutkan ></a>
                </div>

                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    @if ($product_out_sotock)
                        <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full animate-pulse"></span>
                    @endif
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-red-500 text-xl md:text-2xl">{{$product_out_sotock}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Stok Habis</p>
                    </div>
                    <a href="/dashboard/products" class="text-xs underline hover:text-blue-400">Lanjutkan ></a>
                </div>

                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    @if ($product_low_sotock)
                        <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full animate-pulse"></span>
                    @endif
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-orange-400 text-xl md:text-2xl">{{$product_low_sotock}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Stok Rendah</p>
                    </div>
                    <a href="/dashboard/products" class="text-xs underline hover:text-blue-400">Lanjutkan ></a>
                </div>
                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-green-400 text-xl md:text-2xl">{{$total_voucher}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Total Voucher</p>
                    </div>
                    <a href="/dashboard/users" class="text-xs underline hover:text-blue-400">Detail ></a>
                </div>
                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-green-400 text-xl md:text-2xl">{{$total_user_voucher}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Total Voucher Khusus User</p>
                    </div>
                    <a href="/dashboard/users" class="text-xs underline hover:text-blue-400">Detail ></a>
                </div>


            </div>
        </div>
        <div class="mb-8">
            <h1 class=" md:text-xl font-semibold">Ringkasan Keuangan dan User</h1>
            <p class="text-slate-600  md:mb-3 text-xs ">Data Yang Perlu Diketahui</p>
            <div class="grid md:grid-cols-4 grid-cols-2 p-2 gap-2 text-slate-800">
                <!-- Card 2 -->
                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-blue-400 text-xl md:text-2xl">{{$total_users ?? 0}}</p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Total Semua Users (Terdaftar)</p>
                    </div>
                    <a href="/dashboard/users" class="text-xs underline hover:text-blue-400">Detail ></a>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white rounded-lg border border-slate-200 shadow-lg h-28 flex flex-col justify-between items-center p-2 relative">
                    <div class="flex flex-col items-center gap-1">
                        <div class="font-semibold text-lg">
                            <p class="text-green-400 md:text-2xl">Rp.{{ number_format($total_revenue, 0, ',', '.') ?? 0
                                }}
                            </p>
                        </div>
                        <p class="text-slate-600 text-xs text-center">Total Semua Pendapatan</p>
                    </div>
                    <a href="/dashboard/orders" class="text-xs underline hover:text-blue-400">Detail ></a>
                </div>


            </div>
        </div>
    </div>


    <script>
        const ctx = document.getElementById('chart_penjualan');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Min', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                datasets: [{
                    label: 'Penjualan',
                    data: [12, 19, 3],
                    backgroundColor: ['#2196F3']
                }]
            }
        });
    </script>
</x-dashboard.layout>