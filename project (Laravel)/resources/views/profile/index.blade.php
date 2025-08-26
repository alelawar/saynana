<x-layouts.app>
    <x-header />

    <div class="max-w-6xl mx-auto mt-30">
        {{-- Profile User --}}
        <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 p-6">
                <h2 class="text-3xl font-bold text-[#3A1E13] mb-2 flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    Profil Saya
                </h2>
                <p class="text-[#3A1E13]/80">Kelola informasi pribadi Anda</p>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-yellow-50 to-white rounded-xl p-5 border border-yellow-200">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <strong class="text-[#3A1E13]">Nama</strong>
                        </div>
                        <p class="text-[#3A1E13]/80 font-medium">{{ $user->name }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-yellow-50 to-white rounded-xl p-5 border border-yellow-200">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <strong class="text-[#3A1E13]">Email</strong>
                        </div>
                        <p class="text-[#3A1E13]/80 font-medium">{{ $user->email }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-yellow-50 to-white rounded-xl p-5 border border-yellow-200">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <strong class="text-[#3A1E13]">Alamat</strong>
                        </div>
                        <p class="text-[#3A1E13]/80 font-medium">{{ $user->address ?? 'Belum ada' }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-yellow-50 to-white rounded-xl p-5 border border-yellow-200">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <strong class="text-[#3A1E13]">Telepon</strong>
                        </div>
                        <p class="text-[#3A1E13]/80 font-medium">{{ $user->phone ?? 'Belum ada' }}</p>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="bg-[#3A1E13] hover:bg-[#2A150E] text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 flex items-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Riwayat Order --}}
        <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 p-6">
                <h2 class="text-3xl font-bold text-[#3A1E13] mb-2 flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Riwayat Order
                </h2>
                <p class="text-[#3A1E13]/80">Lihat semua pesanan yang pernah dibuat</p>
            </div>

            <div class="p-8">
                @forelse ($orders as $order)
                <div class="bg-gradient-to-r from-white to-yellow-50 rounded-xl border border-yellow-200 p-6 mb-6 last:mb-0 hover:shadow-lg transition-all duration-300">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div class="flex items-center">
                            <div class="bg-yellow-400 p-2 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-[#3A1E13]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-[#3A1E13]/70 font-medium">Kode Order</p>
                                <p class="font-bold text-[#3A1E13] text-lg">{{ $order->code }}</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="bg-yellow-400 p-2 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-[#3A1E13]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-[#3A1E13]/70 font-medium">Status</p>
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold 
                                        @if($order->status === 'completed') bg-green-100 text-green-800
                                        @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="bg-yellow-400 p-2 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-[#3A1E13]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-[#3A1E13]/70 font-medium">Total</p>
                                <p class="font-bold text-[#3A1E13] text-xl">Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-4 mb-4 border border-yellow-100">
                        <p class="font-semibold text-[#3A1E13] mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                            </svg>
                            Produk:
                        </p>
                        <div class="space-y-2">
                            @foreach ($order->items as $item)
                            <div class="flex justify-between items-center py-2 px-3 bg-yellow-50 rounded-lg">
                                <span class="text-[#3A1E13] font-medium">{{ $item->product->name }}</span>
                                <div class="text-right">
                                    <span class="text-sm text-[#3A1E13]/70">x{{ $item->qty }}</span>
                                    <span class="ml-3 font-semibold text-[#3A1E13]">Rp{{ number_format($item->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <a href="/checkout/detail/{{ $order->code }}" class="bg-yellow-400 hover:bg-yellow-500 text-[#3A1E13] px-6 py-3 rounded-full font-semibold transition-all duration-300 flex items-center shadow-md hover:shadow-lg transform hover:-translate-y-1">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <svg class="w-24 h-24 mx-auto text-yellow-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3 class="text-xl font-semibold text-[#3A1E13] mb-2">Belum Ada Riwayat Order</h3>
                    <p class="text-[#3A1E13]/60">Mulai berbelanja untuk melihat riwayat order Anda di sini</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Voucher User --}}
        @if ($vouchers)
        <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 p-6">
                <h2 class="text-3xl font-bold text-[#3A1E13] mb-2 flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    Voucher Saya
                </h2>
                <p class="text-[#3A1E13]/80">Manfaatkan voucher untuk hemat lebih banyak</p>
            </div>

            <div class="p-8">
                <div class="bg-gradient-to-r from-yellow-50 via-white to-yellow-50 border-2 border-dashed border-yellow-300 rounded-2xl p-8 relative overflow-hidden">
                    <!-- Decorative circles -->
                    <div class="absolute -top-4 -left-4 w-8 h-8 bg-yellow-400 rounded-full"></div>
                    <div class="absolute -top-4 -right-4 w-8 h-8 bg-yellow-400 rounded-full"></div>
                    <div class="absolute -bottom-4 -left-4 w-8 h-8 bg-yellow-400 rounded-full"></div>
                    <div class="absolute -bottom-4 -right-4 w-8 h-8 bg-yellow-400 rounded-full"></div>

                    <div class="text-center relative z-10">
                        <div class="bg-[#3A1E13] text-white px-6 py-4 rounded-xl inline-block mb-4 shadow-lg">
                            <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 0v1m-2 0V6a2 2 0 00-2 0v1m2 0h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm font-medium">Kode Voucher</p>
                        </div>

                        <div class="bg-white rounded-xl p-6 border border-yellow-200 shadow-inner mb-4">
                            <span id="voucher-code" class="text-3xl font-bold text-[#3A1E13] tracking-widest">
                                {{ $vouchers->voucher->code }}
                            </span>
                        </div>

                        <button onclick="copyVoucher()" class="bg-yellow-400 hover:bg-yellow-500 text-[#3A1E13] px-8 py-4 rounded-full font-bold text-lg transition-all duration-300 flex items-center mx-auto shadow-lg hover:shadow-xl transform hover:-translate-y-2">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            Salin Kode
                        </button>

                        <div id="copy-msg" class="hidden mt-4 text-green-600 font-semibold text-lg flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Kode berhasil disalin!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <script>
            function copyVoucher() {
                const code = document.getElementById('voucher-code').innerText.trim();
                navigator.clipboard.writeText(code).then(() => {
                    const msg = document.getElementById('copy-msg');
                    msg.classList.remove('hidden');

                    // Add animation effect
                    msg.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        msg.style.transform = 'scale(1)';
                    }, 100);

                    setTimeout(() => {
                        msg.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            msg.classList.add('hidden');
                            msg.style.transform = 'scale(1)';
                        }, 300);
                    }, 1500);
                }).catch(err => {
                    console.error('Gagal menyalin teks: ', err);
                    // Fallback untuk browser yang tidak support clipboard API
                    const textArea = document.createElement('textarea');
                    textArea.value = code;
                    document.body.appendChild(textArea);
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);

                    const msg = document.getElementById('copy-msg');
                    msg.classList.remove('hidden');
                    setTimeout(() => {
                        msg.classList.add('hidden');
                    }, 1500);
                });
            }
        </script>

    </div>
</x-layouts.app>