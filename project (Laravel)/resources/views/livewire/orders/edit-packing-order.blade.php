<div class="max-w-7xl mx-auto p-2 sm:p-4 md:p-6 bg-white">
    {{-- Enhanced Order Management Form --}}

    <div class="mb-6 sm:mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Detail Pesanan</h1>
        <p class="text-sm sm:text-base text-gray-600">Kelola dan perbarui informasi pesanan</p>
    </div>

    <form action="" class="space-y-6 sm:space-y-8" wire:submit.prevent="update">
        {{-- ORDER INFO SECTION --}}
        <div class="bg-gray-50 p-4 sm:p-6 rounded-lg border">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="text-base sm:text-lg">Informasi Pesanan</span>
            </h2>
            <span class="text-red-400 text-xs sm:text-sm block mb-4">Data Status Perlu Diubah</span>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="sm:col-span-2 lg:col-span-1">
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Kode Pesanan</label>
                    <input type="text" value="{{ $order->code }}" disabled
                        class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed text-gray-800 font-mono text-xs sm:text-sm">
                </div>

                <div class="sm:col-span-2 lg:col-span-1">
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Status Pesanan <span
                            class="text-red-600 font-bold">*</span>
                    </label>
                    <select wire:model="order_status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-xs sm:text-sm">
                        <option value="packing" {{ $order->status == 'packing' ? 'selected' : '' }}>Packing</option>
                        <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Shipping</option>
                        <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>

                <div class="sm:col-span-2 lg:col-span-1">
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Total Pembayaran</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-gray-500 text-xs sm:text-sm">Rp</span>
                        <input type="text" value="{{ number_format($order->total_price, 0, ',', '.') }}" disabled
                            class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed text-gray-800 font-semibold text-xs sm:text-sm">
                    </div>
                </div>

                <div class="sm:col-span-1 lg:col-span-1">
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Nama Penyedia <span
                            class="text-red-600 font-bold">*</span>
                    </label>
                    <input type="text" value="" wire:model="shipping_provider" placeholder="Ct: JNT, SPX" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-gray-800 font-mono text-xs sm:text-sm">
                </div>

                <div class="sm:col-span-1 lg:col-span-1">
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">No Resi
                        <span class="text-red-600 font-bold">*</span>
                    </label>
                    <input type="text" required value="" wire:model="resi" placeholder="Ct: JN123****"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-gray-800 font-mono text-xs sm:text-sm">
                </div>

                @if ($order->voucher)
                    <div class="sm:col-span-2 lg:col-span-2">
                        <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Kode Voucher</label>
                        <div class="flex items-center">
                            <input type="text" value="{{ $order->voucher->code }}" disabled
                                class="w-full px-3 py-2 border border-gray-300 rounded-md bg-green-50 text-green-800 font-mono text-xs sm:text-sm">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-500 ml-2 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- CUSTOMER INFO SECTION --}}
        <div class="bg-blue-50 p-4 sm:p-6 rounded-lg border">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-base sm:text-lg">Data Pembeli</span>
            </h2>
            <span class="text-red-400 text-xs sm:text-sm block mb-4">Catatan Pesanan Perlu Diubah</span>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" value="{{ $dataOrder->name }}" disabled
                        class="w-full px-3 py-2 cursor-not-allowed border border-gray-300 rounded-md bg-white text-gray-800 text-xs sm:text-sm">
                </div>

                <div>
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                    <input type="text" value="{{ $dataOrder->phone }}" disabled
                        class="w-full px-3 py-2 cursor-not-allowed border border-gray-300 rounded-md bg-white text-gray-800 text-xs sm:text-sm">
                </div>

                <div>
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" value="{{ $dataOrder->email }}" disabled
                        class="w-full px-3 py-2 cursor-not-allowed border border-gray-300 rounded-md bg-white text-gray-800 text-xs sm:text-sm">
                </div>

                <div>
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Kota</label>
                    <input type="email" value="{{ $dataOrder->city->name }}" disabled
                        class="w-full px-3 py-2 cursor-not-allowed border border-gray-300 rounded-md bg-white text-gray-800 text-xs sm:text-sm">
                </div>

                <div>
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                    <input type="text" value="{{ $dataOrder->city->province->province}}" disabled
                        class="w-full px-3 py-2 cursor-not-allowed border border-gray-300 rounded-md bg-white text-gray-800 text-xs sm:text-sm">
                </div>

                <div>
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Alamat Pengiriman</label>
                    <input type="text" value="{{ $dataOrder->address_line }}" disabled
                        class="w-full px-3 py-2 cursor-not-allowed border border-gray-300 rounded-md bg-white text-gray-800 text-xs sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">
                        Catatan Pesanan (Untuk Pembeli)
                        <span class="text-red-600 font-bold">*</span>
                    </label>
                    <textarea rows="3" wire:model="message"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white text-gray-800 resize-none text-xs sm:text-sm">{{ $dataOrder->message }}</textarea>
                </div>
            </div>
        </div>

        {{-- ITEMS SECTION --}}
        <div class="bg-white p-4 sm:p-6 rounded-lg border">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="text-base sm:text-lg">Barang Yang Dibeli</span>
            </h2>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-left font-medium text-gray-700">Nama Produk
                            </th>
                            <th class="border border-gray-300 px-4 py-2 text-center font-medium text-gray-700">Qty</th>
                            <th class="border border-gray-300 px-4 py-2 text-right font-medium text-gray-700">Harga</th>
                            <th class="border border-gray-300 px-4 py-2 text-right font-medium text-gray-700">Subtotal
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-4 py-3 text-gray-800">{{ $item->product->name }}</td>
                                <td class="border border-gray-300 px-4 py-3 text-center">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $item->qty }}x
                                    </span>
                                </td>
                                <td class="border border-gray-300 px-4 py-3 text-right font-mono text-sm">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </td>
                                <td class="border border-gray-300 px-4 py-3 text-right font-mono text-sm font-semibold">
                                    Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="text-sm">
                        @if ($order->voucher)
                            @php
                                $subtotal = $order->items->sum(fn($item) => $item->price * $item->qty);
                                $discount = ($subtotal * $order->voucher->percentage) / 100;
                            @endphp
                            <tr class="bg-gray-50 font-semibold">
                                <td colspan="3" class="border border-gray-300 px-4 py-3 text-right">Voucher Diskon:</td>
                                <td class="border border-gray-300 px-4 py-3 text-right font-mono text-red-600">
                                    - Rp {{ number_format($discount, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endif

                        <tr class="bg-gray-50 font-semibold">
                            <td colspan="3" class="border border-gray-300 px-4 py-3 text-right">Ongkir:</td>
                            <td class="border border-gray-300 px-4 py-3 text-right font-mono">
                                Rp {{ number_format($city->shipping_cost, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr class="bg-gray-100 font-semibold">
                            <td colspan="3" class="border border-gray-300 px-4 py-3 text-right">Total:</td>
                            <td class="border border-gray-300 px-4 py-3 text-right font-mono text-lg">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>


                </table>
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6">

            <button type="submit" wire:loading.attr="disabled"
                class="w-full sm:w-auto px-4 sm:px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors text-sm sm:text-base disabled:bg-slate-900">
                <span wire:loading.remove>Update Pesanan</span>
                <span wire:loading>Updating...</span>
            </button>
        </div>
    </form>

    @if (session('success'))
        <x-notification color="bg-green-700">{{ session('success') }}</x-notification>
    @endif
    @if (session('error'))
        <x-notification color="bg-red-700">{{ session('error') }}</x-notification>
    @endif
</div>