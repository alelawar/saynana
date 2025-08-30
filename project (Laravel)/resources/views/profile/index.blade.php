<x-layouts.app title="Profile">
    <x-header />

    <div class="max-w-6xl mx-auto px-3 sm:px-5 mt-8 md:mt-30">
        {{-- Profile User --}}
        <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-yellow-100 overflow-hidden mb-6 md:mb-8">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 p-4 md:p-6">
                <h2 class="text-xl md:text-3xl font-bold text-[#3A1E13] mb-1 md:mb-2 flex items-center">
                    <svg class="w-6 h-6 md:w-8 md:h-8 mr-2 md:mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    Profil Saya
                </h2>
                <p class="text-sm md:text-base text-[#3A1E13]/80">Kelola informasi pribadi Anda</p>
                @can('seller')
                    <a href="/dashboard" class="hover:underline text-sm md:text-base">Dashboard</a>
                @endcan
            </div>

            <div class="p-4 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div
                        class="bg-gradient-to-br from-yellow-50 to-white rounded-lg md:rounded-xl p-4 md:p-5 border border-yellow-200">
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <strong class="text-sm md:text-base text-[#3A1E13]">Nama</strong>
                        </div>
                        <p class="text-sm md:text-base text-[#3A1E13]/80 font-medium">{{ $user->name }}</p>
                    </div>

                    <div
                        class="bg-gradient-to-br from-yellow-50 to-white rounded-lg md:rounded-xl p-4 md:p-5 border border-yellow-200">
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <strong class="text-sm md:text-base text-[#3A1E13]">Email</strong>
                        </div>
                        <p class="text-sm md:text-base text-[#3A1E13]/80 font-medium break-words">{{ $user->email }}</p>
                    </div>

                    <div
                        class="bg-gradient-to-br from-yellow-50 to-white rounded-lg md:rounded-xl p-4 md:p-5 border border-yellow-200">
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <strong class="text-sm md:text-base text-[#3A1E13]">Alamat</strong>
                        </div>
                        <p class="text-sm md:text-base text-[#3A1E13]/80 font-medium">
                            {{ $user->address ?? 'Belum ada' }}
                        </p>
                    </div>

                    <div
                        class="bg-gradient-to-br from-yellow-50 to-white rounded-lg md:rounded-xl p-4 md:p-5 border border-yellow-200">
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <strong class="text-sm md:text-base text-[#3A1E13]">Telepon</strong>
                        </div>
                        <p class="text-sm md:text-base text-[#3A1E13]/80 font-medium">{{ $user->phone ?? 'Belum ada' }}
                        </p>
                    </div>
                </div>

                <div class="mt-6 md:mt-8 flex justify-end">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit"
                            class="bg-[#3A1E13] hover:bg-[#2A150E] text-white px-4 md:px-6 py-2 md:py-3 rounded-full text-sm md:text-base font-semibold transition-all duration-300 flex items-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Riwayat Order --}}
        <div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-yellow-100 overflow-hidden mb-6 md:mb-8">
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 p-4 md:p-6">
                <h2 class="text-xl md:text-3xl font-bold text-[#3A1E13] mb-1 md:mb-2 flex items-center">
                    <svg class="w-6 h-6 md:w-8 md:h-8 mr-2 md:mr-3" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Riwayat Order
                </h2>
                <p class="text-sm md:text-base text-[#3A1E13]/80">Lihat semua pesanan yang pernah dibuat</p>
            </div>

            <div class="p-4 md:p-8">
                @forelse ($orders as $order)
                    <div
                        class="bg-gradient-to-r from-white to-yellow-50 rounded-lg md:rounded-xl border border-yellow-200 p-4 md:p-6 mb-4 md:mb-6 last:mb-0 hover:shadow-lg transition-all duration-300">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4 mb-4">
                            <div class="flex items-center">
                                <div class="bg-yellow-400 p-2 rounded-lg mr-3 flex-shrink-0">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-[#3A1E13]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs md:text-sm text-[#3A1E13]/70 font-medium">Kode Order</p>
                                    <p class="font-bold text-[#3A1E13] text-base md:text-lg break-words">{{ $order->code }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="bg-yellow-400 p-2 rounded-lg mr-3 flex-shrink-0">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-[#3A1E13]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs md:text-sm text-[#3A1E13]/70 font-medium">Status</p>
                                    <span class="inline-block px-2 md:px-3 py-1 rounded-full text-xs md:text-sm font-semibold 
                                                                    @if($order->status === 'completed') bg-green-100 text-green-800
                                                                    @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800
                                                                    @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                                                    @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="bg-yellow-400 p-2 rounded-lg mr-3 flex-shrink-0">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-[#3A1E13]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs md:text-sm text-[#3A1E13]/70 font-medium">Total</p>
                                    <p class="font-bold text-[#3A1E13] text-base md:text-xl">
                                        Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg p-3 md:p-4 mb-4 border border-yellow-100">
                            <p class="font-semibold text-[#3A1E13] mb-3 flex items-center text-sm md:text-base">
                                <svg class="w-4 h-4 mr-2 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                                </svg>
                                Produk:
                            </p>
                            <div class="space-y-2">
                                @foreach ($order->items as $item)
                                    <div class="flex justify-between items-center py-2 px-3 bg-yellow-50 rounded-lg">
                                        <span
                                            class="text-[#3A1E13] font-medium text-sm md:text-base min-w-0 mr-2">{{ $item->product->name }}</span>
                                        <div class="text-right flex-shrink-0">
                                            <span class="text-xs md:text-sm text-[#3A1E13]/70">x{{ $item->qty }}</span>
                                            <span
                                                class="ml-2 md:ml-3 font-semibold text-[#3A1E13] text-sm md:text-base">Rp{{ number_format($item->price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <a href="/checkout/detail/{{ $order->code }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-[#3A1E13] px-4 md:px-6 py-2 md:py-3 rounded-full text-sm md:text-base font-semibold transition-all duration-300 flex items-center shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 md:py-12">
                        <svg class="w-16 h-16 md:w-24 md:h-24 mx-auto text-yellow-300 mb-4" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="text-lg md:text-xl font-semibold text-[#3A1E13] mb-2">Belum Ada Riwayat Order</h3>
                        <p class="text-sm md:text-base text-[#3A1E13]/60">Mulai berbelanja untuk melihat riwayat order Anda
                            di sini</p>
                    </div>
                @endforelse
                {{$orders->links()}}
            </div>
        </div>

        {{-- Voucher User --}}
        @if ($vouchers && $vouchers->count())
            @foreach ($vouchers as $v)
                <div class="bg-white rounded-xl shadow-md border border-yellow-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 p-3">
                        <h2 class="text-base font-bold text-[#3A1E13] mb-1 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            Voucher Saya
                        </h2>
                        <p class="text-xs text-[#3A1E13]/80">Manfaatkan voucher untuk hemat lebih banyak</p>
                    </div>

                    <div class="p-4">
                        <div
                            class="bg-gradient-to-r from-yellow-50 via-white to-yellow-50 border-2 border-dashed border-yellow-300 rounded-xl p-5 relative overflow-hidden shadow-sm">

                            <!-- kode voucher -->
                            <div class="text-center relative z-10">
                                <div class="bg-[#3A1E13] text-white px-4 py-2 rounded-lg inline-block mb-3 shadow-md">
                                    <p class="text-[11px] font-medium">Kode Voucher</p>
                                </div>

                                <div class="bg-white rounded-lg p-3 border border-yellow-200 shadow-inner mb-3">
                                    <span id="voucher-code"
                                        class="text-lg font-bold text-[#3A1E13] tracking-widest break-words">
                                        {{ $v->voucher->code }}
                                    </span>
                                </div>

                                <button onclick="copyVoucher()"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-[#3A1E13] px-5 py-2 rounded-full font-semibold text-sm transition-all duration-300 flex items-center mx-auto shadow-md hover:shadow-lg hover:-translate-y-1">
                                    Salin Kode
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div
                class="text-center shadow-xl bg-gradient-to-r mb-8 from-white to-yellow-50 rounded-lg md:rounded-xl border border-yellow-200 py-10">
                <h3 class="text-base font-semibold text-[#3A1E13]">Tidak ada voucher yang tersedia</h3>
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
    <x-footer />
</x-layouts.app>