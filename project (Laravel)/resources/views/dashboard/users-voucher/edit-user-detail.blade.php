<x-dashboard.layout>
    <div class="flex items-center mb-4">
        <button type="button" onclick="window.history.back()"
            class="flex items-center text-gray-600 hover:text-gray-900 transition-colors cursor-pointer">
            <!-- Icon panah kiri -->
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <span>Kembali</span>
        </button>
    </div>
    <div class="md:p-6 max-w-7xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Detail User</h1>

        {{-- Info User --}}
        <div class="bg-gray-50 p-4 sm:p-6 rounded-lg border">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="text-base sm:text-lg">Informasi User</span>
            </h2>


            <div class="flex flex-col lg:flex-row gap-10 md:h-auto items-center">
                <div class="flex-1 w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                            <input type="text" value="{{ $user->name }}" disabled name="name"
                                class="w-full px-3 py-2 border border-gray-300 disabled:cursor-not-allowed bg-slate-200 rounded-md text-gray-800 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input value="{{ $user->email }}" disabled name="stock"
                                class="w-full px-3 py-2 border border-gray-300 disabled:cursor-not-allowed bg-slate-200 rounded-md text-gray-800 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">No.HP</label>
                            <input value="{{ $user->phone ?? 'Tidak Dibuat'}}" disabled name="stock"
                                class="w-full px-3 py-2 border border-gray-300 disabled:cursor-not-allowed bg-slate-200 rounded-md text-gray-800 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pengeluaran (Kotor)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2.5 text-gray-500 text-sm">Rp</span>
                                <input type="number" value="{{ number_format($total_revenue, 0, ',', '.') }}" disabled
                                    name="price"
                                    class="w-full  pl-10 pr-3 py-2 border border-gray-300 disabled:cursor-not-allowed bg-slate-200 rounded-md text-green-600 font-semibold text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Total Order</label>
                            <input type="text" value="{{ $total_order }}" disabled name="name"
                                class="w-full px-3 py-2 border border-gray-300 disabled:cursor-not-allowed bg-slate-200 rounded-md text-green-600 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Total Voucher Pribadi</label>
                            <input type="text" value="{{ $total_voucher }}" disabled name="name"
                                class="w-full px-3 py-2 border border-gray-300 disabled:cursor-not-allowed bg-slate-200 rounded-md text-green-600 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <textarea disabled name="description" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 disabled:cursor-not-allowed bg-slate-200 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-800 text-sm resize-y">{{ $user->address ?? 'Tidak Dibuat' }}</textarea>
                    </div>

                </div>
            </div>

        </div>

        {{-- List Orders --}}
        <h2 class="text-xl font-bold mb-5 mt-10">Orders</h2>
        <div class="space-y-3 mb-10">
            @forelse($orders as $order)
                <div class="bg-white shadow-sm rounded-lg p-4 border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <h4 class="text-sm font-semibold text-gray-900">{{ $order['code'] }}</h4>
                                <span class="px-2 py-1 text-xs font-medium rounded border
                                @switch($order->status)
                                    @case('pending') bg-yellow-100 text-yellow-700 border-yellow-200 @break
                                    @case('paid') bg-blue-100 text-blue-700 border-blue-200 @break
                                    @case('packing') bg-purple-100 text-purple-700 border-purple-200 @break
                                    @case('shipping') bg-orange-100 text-orange-700 border-orange-200 @break
                                    @case('success') bg-green-100 text-green-700 border-green-200 @break
                                    @case('canceled') bg-red-100 text-red-700 border-red-200 @break
                                    @default bg-gray-100 text-gray-700 border-gray-200
                                @endswitch">
                                {{ ucfirst($order->status) }}
                            </span>


                            </div>

                            <div class="text-sm text-gray-600 space-y-1">
                                <p><span class="font-medium">Total:</span> Rp
                                    {{ number_format($order['total_price'], 0, ',', '.') }}
                                </p>
                                <p><span class="font-medium">Tanggal:</span>
                                    {{ \Carbon\Carbon::parse($order['created_at'])->format('d M Y') }}</p>
                            </div>
                        </div>

                        <div class="ml-4">
                            <a href="/dashboard/orders/{{ $order['id'] }}/edit"
                                class="inline-flex items-center text-sm text-blue-600 hover:text-blue-700 font-medium">
                                Detail
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-gray-50 border border-dashed border-gray-300 rounded-lg p-6 text-center text-gray-500">
                        <p class="font-medium">Belum ada order</p>
                        <p class="text-sm text-gray-400">User ini belum pernah melakukan transaksi.</p>
                </div>            
            @endforelse
            {{ $orders->links() }}
        </div>

        <h2 class="text-xl font-bold mb-5 mt-10">Voucher Khusus Pengguna {{$user->name}}</h2>
       <div class="space-y-3 mb-6">
            <div x-data="{ open: false }">
                <!-- Tombol -->
                <button 
                    @click="open = true" 
                    class="px-4 py-1.5 bg-blue-500 hover:bg-blue-600 shadow-xl rounded-lg text-white cursor-pointer">
                    Tambahkan Voucher +
                </button>

                <!-- Modal -->
                <div 
                    x-show="open"
                    x-transition
                    class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
                >
                    <div 
                        @click.away="open = false"
                        x-transition.scale
                        class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6"
                    >
                        <!-- Header Modal -->
                        <div class="flex justify-between items-center border-b pb-2 mb-4">
                            <h2 class="md:text-lg font-semibold text-gray-700">
                                Buat Voucher Baru
                                <p class="text-xs md:text-sm text-slate-500">(Hanya Untuk User ini)</p>
                            </h2>
                            <button @click="open = false" class="text-gray-400 hover:text-gray-600 cursor-pointer">&times;</button>
                        </div>

                        <!-- Isi Modal -->
                        <form class="space-y-4" method="POST" action="/dashboard/voucher/user">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">Code Voucher</label>
                                <input type="text" name="code" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">Diskon (%)
                                    <p class="text-xs text-red-500">*Maksimal 50%</p>
                                </label>
                                <input type="number" name="percentage" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">Max Penggunaan</label>
                                    <input  disabled value="1 (Maximal  )"
                                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 outline-none bg-gray-200 cursor-not-allowed">
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="open = false" class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100 cursor-pointer">
                                    Batal
                                </button>
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 cursor-pointer">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @forelse ($vouchers as $voucher)
                <div class="bg-white shadow-sm rounded-lg p-4 border 
                    {{ $voucher['is_used'] ? 'bg-gray-100 border-gray-200 opacity-70' : 'border-gray-200 hover:shadow-md transition-shadow' }}">
                    
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900">
                                {{ $voucher['voucher']['code'] }}
                            </h4>
                            <p class="text-xs text-gray-500">
                                Diskon {{ $voucher['voucher']['percentage'] }}%
                            </p>
                            <p class="text-xs text-gray-400">
                                Dibuat: {{ \Carbon\Carbon::parse($voucher['created_at'])->format('d M Y') }}
                            </p>
                        </div>

                        <span class="px-2 py-1 text-xs font-medium rounded
                            @if($voucher['is_used'])
                                bg-gray-200 text-gray-600
                            @else
                                bg-green-100 text-green-700
                            @endif">
                            {{ $voucher['is_used'] ? 'Sudah Dipakai' : 'Tersedia' }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="bg-gray-50 border border-dashed border-gray-300 rounded-lg p-6 text-center text-gray-500">
                    <svg class="mx-auto mb-2 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 14l2-2 4 4m0 0l4-4m-4 4V7" />
                    </svg>
                    <p class="font-medium">Tidak ada voucher</p>
                    <p class="text-sm text-gray-400">User ini belum memiliki voucher aktif.</p>
                </div>
            @endforelse
        </div>
    </div>

</x-dashboard.layout>