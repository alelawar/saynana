<x-layouts.app>
    <x-header />
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6 mt-30">
        <h1 class="text-2xl font-bold mb-4">Checkout Berhasil 🎉</h1>

        <div class="mb-4">
            <p class="text-gray-600">Kode Order:</p>
            <p class="text-lg font-semibold">{{ $order->code }}</p>
        </div>

        @if($voucher_code)
            <div class="mb-4 bg-green-100 p-3 rounded">
                <p class="text-green-800 font-medium">Voucher digunakan:
                    <span class="font-bold">{{ $voucher_code->code }}</span>
                </p>
                <p>Discount: {{$voucher_code->percentage}}% !</p>
            </div>
        @endif
        {{-- {{ dd(session()->all()) }} --}}

        @if($discountAmount)
            <p>Discount: Rp.{{ $discountAmount }} !</p>
        @endif

        <table class="w-full border-collapse border border-gray-200 mb-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-200 px-4 py-2 text-left">Produk</th>
                    <th class="border border-gray-200 px-4 py-2 text-left">Harga Produk</th>
                    <th class="border border-gray-200 px-4 py-2 text-center">Qty</th>
                    <th class="border border-gray-200 px-4 py-2 text-right">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @php
                    // BUAT NGITUNG TOTAL HARGA (KOTOR BELUM DI DISCOUNT)
                    $totalPrice = 0;
                @endphp
                {{-- LOOPING BUAT DAPETIN DATA PRODUCTNYA --}}
                @foreach ($order->items as $item)
                    @php
                        $itemTotal = $item->price * $item->qty;
                        $totalPrice += $itemTotal;
                    @endphp
                    <tr>
                        <td class="border border-gray-200 px-4 py-2">{{ $item->product->name }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $item->product->price }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center">{{ $item->qty }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-right">
                            Rp {{ number_format($itemTotal, 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
                <tr class="bg-gray-50 font-semibold">
                    <td class="border border-gray-200 px-4 py-2" colspan="2">Total Harga Product:</td>
                    <td class="border border-gray-200 px-4 py-2 text-right">
                        Rp {{ number_format($totalPrice, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>

        <form action="/payment" method="post" id="checkout-form">
            @csrf
            {{-- <p>{{$order->id}}</p> --}}
            <div class="mt-2">
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

                <x-auth.input name="name" type="text" placeholder="Nama Anda" label="Nama"
                    value="{{ auth()->user()->name ?? '' }}" />

                <x-auth.input name="email" type="email" placeholder="Email Anda" label="Email"
                    value="{{ auth()->user()->email ?? '' }}" />

                <x-auth.input name="phone" type="tel" placeholder="Nomor Telepon Anda *optional" label="Nomor Telepon"
                    value="{{ auth()->user()->phone ?? '' }}" :required="false" />

                    
                    
                    <textarea name="address" class="border border-gray-300 rounded px-3 py-2 w-full"
                    placeholder="Alamat Anda">{{ auth()->user()->address ?? '' }}</textarea>
                </div>  
                <div class="my-6">
                 <livewire:location-selector 
                    :basePrice="$order->total_price" 
                    :discountAmount="$discountAmount ?? 0" />
                </div>

            <div class="mt-6">
                <a href="/" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kembali ke Beranda</a>
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-blue-700">Beli</button>
            </div>
        </form>

        <div id="loading-modal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
            <svg class="animate-spin h-10 w-10 text-orange-600 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10"
                    stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
            </svg>
            <p class="text-gray-700 font-medium">Memproses pesanan...</p>
        </div>
    </div>
    </div>

    <script>
        const form = document.getElementById('checkout-form');
        const loadingModal = document.getElementById('loading-modal');

        form.addEventListener('submit', function () {
            loadingModal.classList.remove('hidden');
        });
    </script>
</x-layouts.app>