<x-layouts.app>
    <x-header />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-16 mt-30">
        <!-- Header Section -->
        <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 p-6">
                <h1 class="text-3xl font-bold text-[#3A1E13] mb-2 flex items-center sour-gummy">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    Kelola Pesanan Anda
                </h1>
                <p class="text-[#3A1E13]">Cari riwayat pesanan anda!</p>
            </div>
        </div>

        <!-- Search & Filter Form -->
        <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden mb-8">
            <div class="p-6">
                <form action="" method="GET" class="space-y-6">
                    <!-- Search Input -->
                    <div class="w-full">
                        <label class="block text-[#3A1E13] font-semibold mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Pencarian
                        </label>
                        <input type="text" name="q" value="{{ request('q') }}"
                            placeholder="Cari berdasarkan nama pembeli atau kode order..."
                            class="w-full px-4 py-4 border-2 border-yellow-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 bg-gradient-to-r from-white to-yellow-50 transition-all duration-300 placeholder-[#3A1E13]/50"
                            required>

                        @error('q')
                            <p class="mt-2 text-sm text-red-600">Masukan Minimal 3 Karakter</p>
                        @enderror
                    </div>


                    <!-- Filter dan Button -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <label class="block text-[#3A1E13] font-semibold mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                                Filter Status
                            </label>
                            <select name="status"
                                class="w-full px-4 py-4 border-2 border-yellow-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 bg-gradient-to-r from-white to-yellow-50 text-[#3A1E13] transition-all duration-300">
                                <option value="">Semua Status</option>

                                <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>🔵 Paid</option>
                                <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>🟢 Success
                                </option>
                                <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>🔴
                                    Canceled</option>
                            </select>
                        </div>

                        <div class="flex gap-3 sm:self-end">
                            <button type="submit"
                                class="flex-1 sm:flex-none px-8 py-4 bg-yellow-400 hover:bg-yellow-500 text-[#3A1E13] rounded-xl font-bold transition-all duration-300 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Cari
                            </button>
                            @if(request('q') || request('status'))
                                <a href="{{ url()->current() }}"
                                    class="flex-1 sm:flex-none px-8 py-4 bg-[#3A1E13] hover:bg-[#2A150E] text-white rounded-xl font-bold transition-all duration-300 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Reset
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Active Filter Info -->
        @if(request('q') || request('status'))
            <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 border border-yellow-200 rounded-xl p-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-[#3A1E13] font-semibold">
                        Filter aktif:
                        @if(request('q'))
                            <span class="bg-white px-3 py-1 rounded-full text-sm ml-2">Pencarian: "{{ request('q') }}"</span>
                        @endif
                        @if(request('status'))
                            <span class="bg-white px-3 py-1 rounded-full text-sm ml-2">Status:
                                {{ ucfirst(request('status')) }}</span>
                        @endif
                    </p>
                </div>
            </div>
        @endif

        <!-- Orders List -->
        @if ($orders && count($orders) > 0)
            <div class="space-y-4">
                @foreach ($orders as $order)
                    <a href="/checkout/detail/{{ $order->code }}"
                        class="block bg-white rounded-2xl shadow-md border border-yellow-100 hover:shadow-xl hover:border-yellow-300 transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">

                        <div class="p-6">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <!-- Order Info -->
                                <div class="flex-1">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-yellow-400 p-2 rounded-lg mr-3">
                                            <svg class="w-6 h-6 text-[#3A1E13]" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <h2 class="text-2xl font-bold text-[#3A1E13]">Order #{{ $order->code }}</h2>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div
                                            class="bg-gradient-to-r from-yellow-50 to-white rounded-lg p-4 border border-yellow-100">
                                            <div class="flex items-center mb-2">
                                                <svg class="w-4 h-4 text-yellow-600 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                <span class="text-[#3A1E13]/70 text-sm font-medium">Pelanggan</span>
                                            </div>
                                            <p class="text-[#3A1E13] font-semibold text-lg">{{ $order->dataOrder->name ?? '-' }}
                                            </p>
                                        </div>

                                        <div
                                            class="bg-gradient-to-r from-yellow-50 to-white rounded-lg p-4 border border-yellow-100">
                                            <div class="flex items-center mb-2">
                                                <svg class="w-4 h-4 text-yellow-600 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                                </svg>
                                                <span class="text-[#3A1E13]/70 text-sm font-medium">Total</span>
                                            </div>
                                            <p class="text-[#3A1E13] font-bold text-xl">
                                                Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status Badge -->
                                <div class="flex-shrink-0 text-center">
                                    <div
                                        class="inline-flex items-center px-4 py-3 rounded-xl font-bold text-lg shadow-lg
                                                @if($order->status == 'pending') bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800 border-2 border-yellow-300
                                                @elseif($order->status == 'paid') bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 border-2 border-blue-300
                                                @elseif($order->status == 'success') bg-gradient-to-r from-green-100 to-green-200 text-green-800 border-2 border-green-300
                                                @elseif($order->status == 'canceled') bg-gradient-to-r from-red-100 to-red-200 text-red-800 border-2 border-red-300
                                                @else bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 border-2 border-gray-300 @endif">

                                        @if($order->status == 'pending')
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @elseif($order->status == 'paid')
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @elseif($order->status == 'success')
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        @elseif($order->status == 'canceled')
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        @endif

                                        {{ ucfirst($order->status) }}
                                    </div>

                                    <!-- View Details Arrow -->
                                    <div class="mt-3 text-yellow-600">
                                        <svg class="w-6 h-6 mx-auto animate-bounce" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <p class="text-xs mt-1 font-medium">Lihat Detail</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom border dengan gradient -->
                        <div class="h-1 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400"></div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            @if(method_exists($orders, 'links'))
                <div class="mt-8 bg-white rounded-2xl shadow-lg border border-yellow-100 p-6">
                    <div class="overflow-x-auto">
                        {{ $orders->appends(request()->query())->links() }}
                    </div>
                </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden">
                <div class="text-center py-16">
                    <div class="mb-6">
                        <svg class="w-24 h-24 mx-auto text-yellow-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 8h6m-6 4h6" />
                        </svg>
                    </div>

                    <h3 class="text-2xl font-bold text-[#3A1E13] mb-4">
                        @if(request('q') || request('status'))
                            Tidak Ada Pesanan Ditemukan
                        @else
                            Belum Ada Pesanan
                        @endif
                    </h3>

                    <p class="text-[#3A1E13]/60 text-lg max-w-md mx-auto">
                        @if(request('q') || request('status'))
                            Tidak ada pesanan yang sesuai dengan filter pencarian Anda. Coba ubah kata kunci atau status filter.
                        @else
                            Coba cari dengan kata kunci yang lebih spesifik atau periksa kembali kriteria pencarian Anda.
                        @endif
                    </p>

                    @if(request('q') || request('status'))
                        <div class="mt-6">
                            <a href="{{ url()->current() }}"
                                class="inline-flex items-center px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-[#3A1E13] rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Reset Pencarian
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>