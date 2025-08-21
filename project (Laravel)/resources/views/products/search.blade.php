<x-layouts.app>
    <x-header />
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <form action="" method="GET" class="space-y-4">
            <!-- Search Input - Full width pada mobile -->
            <div class="w-full">
                <input type="text" name="q" value="{{ request('q') }}" 
                    placeholder="Cari berdarkan nama pembeli / Code Order"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <!-- Filter dan Button - Responsive layout -->
            <div class="flex flex-col sm:flex-row gap-2">
                <select name="status" class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success</option>
                    <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
                
                <div class="flex gap-2">
                    <button type="submit"
                        class="flex-1 sm:flex-none px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors whitespace-nowrap">
                        Cari
                    </button>
                    @if(request('q') || request('status'))
                        <a href="{{ url()->current() }}"
                            class="flex-1 sm:flex-none px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors text-center whitespace-nowrap">
                            Reset
                        </a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Tampilkan info filter aktif --}}
        @if(request('q') || request('status'))
            <div class="mt-4 p-3 bg-blue-50 rounded-lg">
                <p class="text-sm text-blue-700">
                    Filter aktif: 
                    @if(request('q'))
                        <span class="font-medium">Pencarian: "{{ request('q') }}"</span>
                    @endif
                    @if(request('q') && request('status')) | @endif
                    @if(request('status'))
                        <span class="font-medium">Status: {{ ucfirst(request('status')) }}</span>
                    @endif
                </p>
            </div>
        @endif

        @if ($orders && count($orders) > 0)
            <div class="space-y-4 mt-6">
                @foreach ($orders as $order)
                    <a href="/checkout/detail/{{ $order->code }}"
                        class="block border rounded-lg p-4 hover:shadow-md transition bg-white">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-4">
                            <div class="flex-1">
                                <h2 class="text-lg font-semibold text-gray-800">Order #{{ $order->code }}</h2>
                                <div class="space-y-1 mt-1 text-sm sm:text-base">
                                    <p class="text-gray-600">
                                        Pelanggan: <span class="font-medium">{{ $order->dataOrder->name ?? '-' }}</span>
                                    </p>
                                    <p class="text-gray-600 font-medium">
                                        Total: Rp{{ number_format($order->total_price, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-block px-3 py-1 text-sm rounded-full 
                                        @if($order->status == 'pending') bg-yellow-100 text-yellow-800 
                                        @elseif($order->status == 'confirmed') bg-blue-100 text-blue-800 
                                        @elseif($order->status == 'success') bg-green-100 text-green-800 
                                        @elseif($order->status == 'canceled') bg-red-100 text-red-800 
                                        @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            {{-- Pagination dengan preserve query parameters --}}
            @if(method_exists($orders, 'links'))
                <div class="mt-6 overflow-x-auto">
                    {{ $orders->appends(request()->query())->links() }}
                </div>
            @endif
        @else
            <p class="text-center text-gray-500 mt-8">
                @if(request('q') || request('status'))
                    Tidak ada order yang sesuai dengan filter 😅
                @else
                    Tetot, nggak ada hasil 😅
                @endif
            </p>
        @endif
    </div>
</x-layouts.app>