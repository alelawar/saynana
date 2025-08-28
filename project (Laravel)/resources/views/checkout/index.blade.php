<x-layouts.app>
    <x-header />

    <div class="w-4xl mx-auto mt-30 px-4 sm:px-6 lg:px-16">
        <!-- Success Header -->
        <!-- <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 p-8 text-center">
                <div class="mb-4">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-lg">
                        <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-[#3A1E13] mb-2">Checkout Berhasil!</h1>
                <p class="text-[#3A1E13]/80 text-lg">Terima kasih atas pesanan Anda 🎉</p>
            </div>
        </div> -->

        <!-- Order Code Section -->
        <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 p-8 mb-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-yellow-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                    <h2 class="text-2xl font-bold text-[#3A1E13]">Kode Pesanan Anda</h2>
                </div>
                <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 border-2 border-dashed border-yellow-300 rounded-xl p-6">
                    <p class="text-3xl font-bold text-[#3A1E13] tracking-widest">{{ $order->code }}</p>
                    <p class="text-[#3A1E13]/70 mt-2">Simpan kode ini untuk melacak pesanan Anda</p>
                </div>
            </div>
        </div>

        <!-- Voucher Info -->
        @if($voucher_code)
        <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-green-400 to-green-300 p-6">
                <h3 class="text-2xl font-bold text-white mb-2 flex items-center">
                    <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    Voucher Berhasil Digunakan!
                </h3>
                <div class="bg-white/20 rounded-lg p-4 mt-4">
                    <p class="text-white font-semibold text-lg">
                        Kode: <span class="font-bold tracking-wider">{{ $voucher_code->code }}</span>
                    </p>
                    <p class="text-white/90">Diskon: {{$voucher_code->percentage}}% 🎉</p>
                </div>
            </div>
        </div>
        @endif

        @if($discountAmount)
        <div class="bg-white rounded-xl border border-green-200 p-4 mb-6">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                </svg>
                <span class="text-green-800 font-semibold text-lg">
                    Hemat: Rp{{ number_format($discountAmount, 0, ',', '.') }}!
                </span>
            </div>
        </div>
        @endif

        <!-- Order Summary Table -->
        <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 p-6">
                <h3 class="text-2xl font-bold text-[#3A1E13] flex items-center">
                    <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Ringkasan Pesanan
                </h3>
            </div>

            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-yellow-50 to-yellow-100 border-2 border-yellow-200">
                                <th class="px-6 py-4 text-left text-[#3A1E13] font-bold">Produk</th>
                                <th class="px-6 py-4 text-left text-[#3A1E13] font-bold">Harga Satuan</th>
                                <th class="px-6 py-4 text-center text-[#3A1E13] font-bold">Qty</th>
                                <th class="px-6 py-4 text-right text-[#3A1E13] font-bold">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalPrice = 0;
                            @endphp
                            @foreach ($order->items as $item)
                            @php
                            $itemTotal = $item->price * $item->qty;
                            $totalPrice += $itemTotal;
                            @endphp
                            <tr class="border-b border-yellow-100 hover:bg-yellow-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="bg-yellow-400 p-2 rounded-lg mr-3">
                                            <svg class="w-5 h-5 text-[#3A1E13]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                                            </svg>
                                        </div>
                                        <span class="font-semibold text-[#3A1E13]">{{ $item->product->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-[#3A1E13] font-medium">
                                    Rp{{ number_format($item->product->price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="bg-yellow-100 text-[#3A1E13] px-3 py-1 rounded-full font-semibold">
                                        {{ $item->qty }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-[#3A1E13]">
                                    Rp{{ number_format($itemTotal, 0, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                            <tr class="bg-gradient-to-r from-yellow-100 to-yellow-200 border-t-2 border-yellow-300">
                                <td class="px-6 py-4 font-bold text-[#3A1E13] text-lg" colspan="3">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 mr-2 text-[#3A1E13]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                        </svg>
                                        Total Harga Produk:
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-[#3A1E13] text-xl">
                                    Rp{{ number_format($totalPrice, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Checkout Form -->
        <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 p-6">
                <h3 class="text-2xl font-bold text-[#3A1E13] flex items-center">
                    <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Informasi Pengiriman
                </h3>
                <p class="text-[#3A1E13]/80 mt-2">Lengkapi data untuk menyelesaikan pesanan</p>
            </div>

            <div class="p-8">
                <form action="/payment" method="post" id="checkout-form" class="space-y-6">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    @auth()
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    @endauth

                    @if($voucher_code)
                    <input type="hidden" name="voucher_code" value="{{ $voucher_code->code }}">
                    @endif

                    @foreach ($order->items as $item)
                    <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $item->product_id }}">
                    <input type="hidden" name="items[{{ $loop->index }}][qty]" value="{{ $item->qty }}">
                    @endforeach

                    <!-- Personal Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <x-auth.input name="name" type="text" placeholder="Masukkan nama lengkap" label="Nama Lengkap"
                                value="{{ auth()->user()->name ?? '' }}" />

                            <x-auth.input name="email" type="email" placeholder="contoh@email.com" label="Email"
                                value="{{ auth()->user()->email ?? '' }}" />
                        </div>

                        <div class="space-y-6">
                            <x-auth.input name="phone" type="tel" placeholder="08xxxxxxxxxx" label="Nomor Telepon (Opsional)"
                                value="{{ auth()->user()->phone ?? '' }}" :required="false" />

                            <div>
                                <label class="block text-[#3A1E13] font-semibold mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Alamat Lengkap
                                </label>
                                <textarea name="address"
                                    class="w-full px-4 py-4 border-2 border-yellow-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 bg-gradient-to-r from-white to-yellow-50 transition-all duration-300 placeholder-[#3A1E13]/50 text-[#3A1E13]"
                                    placeholder="Masukkan alamat lengkap untuk pengiriman..."
                                    rows="4">{{ auth()->user()->address ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Location Selector -->
                    <div class="bg-gradient-to-r from-yellow-50 to-white rounded-xl border-2 border-yellow-200 p-6">
                        <h4 class="text-xl font-bold text-[#3A1E13] mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Lokasi & Ongkos Kirim
                        </h4>
                        <livewire:location-selector
                            :basePrice="$order->total_price"
                            :discountAmount="$discountAmount ?? 0" />
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-yellow-200">
                        <a href="/"
                            class="flex-1 sm:flex-none px-8 py-4 bg-[#3A1E13] hover:bg-[#2A150E] text-white rounded-xl font-bold transition-all duration-300 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Kembali ke Beranda
                        </a>

                        <button type="submit"
                            class="flex-1 px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-[#3A1E13] rounded-xl font-bold text-lg transition-all duration-300 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Lanjutkan Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Loading Modal -->
        <div id="loading-modal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
            <div class="bg-white rounded-2xl shadow-2xl p-8 flex flex-col items-center max-w-sm mx-4">
                <div class="relative mb-6">
                    <div class="w-16 h-16 border-4 border-yellow-200 rounded-full animate-pulse"></div>
                    <div class="w-16 h-16 border-4 border-yellow-400 border-t-transparent rounded-full animate-spin absolute top-0"></div>
                </div>
                <h3 class="text-xl font-bold text-[#3A1E13] mb-2">Memproses Pesanan</h3>
                <p class="text-[#3A1E13]/70 text-center">Harap tunggu sebentar, kami sedang memproses pesanan Anda...</p>
                <div class="mt-4 flex space-x-1">
                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('checkout-form');
        const loadingModal = document.getElementById('loading-modal');

        form.addEventListener('submit', function() {
            loadingModal.classList.remove('hidden');
        });
    </script>
</x-layouts.app>