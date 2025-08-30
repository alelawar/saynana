<x-layouts.app>
    <x-header />

    <div class="min-h-screen bg-gradient-to-br from-yellow-50 to-white py-8">
        <div class="max-w-4xl mx-auto p-6 md:mt-20">
            <!-- Page Title -->
            <div class="text-center mb-8">
                <h1 class="text-2xl md:text-4xl font-bold text-[#3A1E13] mb-2">Detail Order</h1>
                <div class="w-24 h-1 bg-yellow-400 mx-auto rounded-full"></div>
            </div>

            <!-- Order Summary Card -->
            <div
                class="bg-white rounded-2xl shadow-lg border-l-4 border-yellow-400 p-6 mb-8 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#3A1E13]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-[#3A1E13]">Informasi Order</h2>
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <div class="bg-yellow-50 rounded-lg p-4">
                        <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Order Code</p>
                        <p class="text-lg font-bold text-[#3A1E13]">{{ $order->code }}</p>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-4">
                        <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Status</p>
                        <span class="inline-flex px-3 py-1 rounded-full text-sm font-semibold
                            @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status === 'completed') bg-green-100 text-green-800
                            @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                            @else bg-blue-100 text-blue-800
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-4">
                        <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Total Price</p>
                        <p class="text-lg font-bold text-[#3A1E13]">Rp
                            {{ number_format($order->total_price, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-4">
                        <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Voucher Code</p>
                        <p class="text-lg font-bold text-[#3A1E13]">{{ $order->voucher->code ?? 'Tidak Ada'}}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Customer Information -->
            @if($order->dataOrder)
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-[#3A1E13]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-[#3A1E13]">Data Pemesan</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Nama</p>
                                <p class="text-lg text-[#3A1E13] font-medium">{{ $order->dataOrder->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Email</p>
                                <p class="text-lg text-[#3A1E13]">{{ $order->dataOrder->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Telepon</p>
                                <p class="text-lg text-[#3A1E13]">{{ $order->dataOrder->phone ?? '-' }}</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Alamat</p>
                                <p class="text-lg text-[#3A1E13]">{{ $order->dataOrder->address_line }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Kota</p>
                                <p class="text-lg text-[#3A1E13]">{{ $order->dataOrder->city->name ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Provinsi</p>
                                <p class="text-lg text-[#3A1E13]">{{ $order->dataOrder->city->province->province ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Shipping Information -->
            @if($order->shipping)
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-[#3A1E13]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-[#3A1E13]">Data Layanan</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-yellow-50 rounded-lg p-4">
                            <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">Penyedia</p>
                            <p class="text-lg font-bold text-[#3A1E13]">{{ $order->shipping->shipping_provider }}</p>
                        </div>
                        <div class="bg-yellow-50 rounded-lg p-4">
                            <p class="text-sm font-medium text-[#3A1E13] opacity-70 mb-1">No.Resi</p>
                            <p class="text-lg font-bold text-[#3A1E13] font-mono">{{ $order->shipping->resi }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Order Items -->
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#3A1E13]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-[#3A1E13]">Items</h2>
                </div>

                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div
                            class="flex items-center justify-between p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-colors duration-200">
                            <div class="flex-1">
                                <h3 class="md:text-lg font-semibold text-[#3A1E13] mb-1">
                                    {{ $item->product->name ?? 'Produk tidak ditemukan' }}
                                </h3>
                                <p class="text-[#3A1E13] text-xs opacity-70">
                                    Kuantitas: <span class="font-semibold">(x{{ $item->qty ?? 1 }})</span>
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-xl font-bold text-[#3A1E13]">
                                    Rp {{ number_format($item->product->price ?? 0, 0, ',', '.') }}
                                </p>
                                <p class="text-sm text-[#3A1E13] opacity-70">per item</p>
                            </div>
                        </div>
                    @endforeach
                    <div
                        class="flex items-center justify-between p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                        <div class="flex-1">
                            <h3 class="md:text-lg font-semibold text-[#3A1E13] mb-1">
                                Ongkos Kirim
                                <p><i class="font-semibold bi bi-cart3"></i></p>
                            </h3>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-bold text-[#3A1E13]">
                                @if(($city->shipping_cost ?? 0) == 0)
                                    Gratis
                                @else
                                    Rp {{ number_format($city->shipping_cost, 0, ',', '.') }}
                                @endif
                            </p>

                            <p class="text-sm text-[#3A1E13] opacity-70">{{$city->name}}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Summary -->
                <div class="mt-6 pt-6 border-t-2 border-yellow-200">
                    <div class="flex justify-between items-center">
                        <p class=" text-lg md:text-xl font-bold text-[#3A1E13]">Total Keseluruhan:</p>
                        <p class="md:text-2xl font-bold text-[#3A1E13] bg-yellow-100 px-4 py-2 rounded-lg">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="text-center mt-8">
                <button onclick="history.back()"
                    class="inline-flex items-center px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-[#3A1E13] font-semibold rounded-full transition-all duration-200 transform hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </button>
            </div>
        </div>
    </div>
</x-layouts.app>