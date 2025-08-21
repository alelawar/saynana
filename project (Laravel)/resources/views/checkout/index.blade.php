<x-layouts.app>
    <x-header />
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
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
            @else
            <p>gada</p>
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

        <form action="/payment" method="post">
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
    </div>
</x-layouts.app>