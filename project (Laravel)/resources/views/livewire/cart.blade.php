<div class="">
    {{-- INI SI BUTTON BUAT NGEAKTIFIN DIV CARTNYA --}}
    <button wire:click="toggleCart" class="py-3 px-2.5 bg-slate-200 rounded-lg cursor-pointer">
        Cart
        <span class="bg-red-500 text-white rounded-full px-2 py-1 text-sm">
            {{ $this->getTotalQuantity() }}
            {{-- Atau kalau pakai computed property: {{ $this->totalQuantity }} --}}
        </span>
    </button>

    {{-- INI CART NYA --}}
    <div class="bg-gray-100 p-4 rounded-md mt-4 {{ !$isOpen ? 'hidden' : '' }}" id="cart">
        <h3 class="text-lg font-bold mb-2">Cart</h3>
        <button wire:click="toggleCart">X</button>

        <form action="/checkout" method="post">
            @csrf
            {{-- @auth --}}
                <div class="mb-3">
                    <label for="voucher_code" class="block mb-1 font-semibold">Voucher Code</label>
                    <input type="text" name="voucher_code" id="voucher_code"
                        class="border border-gray-300 rounded px-3 py-2 w-full" placeholder="Masukkan voucher jika ada" autocomplete="off">
                </div>
            {{-- @endauth --}}
            @if (!empty($cart))
                <ul>
                    @foreach ($cart as $productId => $item)
                        <li class="flex justify-between py-1">
                            <span>{{ $item['name'] }} (x{{ $item['qty'] }})</span>
                            <span>Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>

                            <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $productId }}">
                            <input type="hidden" name="items[{{ $loop->index }}][qty]" value="{{ $item['qty'] }}">
                            <input type="hidden" name="items[{{ $loop->index }}][price]" value="{{ $item['price'] }}">

                            <button type="button" wire:click="removeItem('{{ $productId }}')" wire:loading.attr="disabled"
                                wire:target="removeItem('{{ $productId }}')"
                                class="mt-3 bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700 cursor-pointer disabled:bg-slate-900">
                                <span wire:loading.remove wire:target="removeItem('{{ $productId }}')">X</span>
                                <span wire:loading wire:target="removeItem('{{ $productId }}')">...</span>
                            </button>
                        </li>
                    @endforeach
                </ul>

                <button type="submit"
                    class="mt-3 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 disabled:bg-slate-900 cursor-pointer">
                    Checkout
                </button>

            @else
                <p class="text-gray-500">Cart is empty</p>
            @endif
        </form>
        @if (!empty($cart))
            <button type="button" wire:click="clearCart" wire:loading.attr="disabled" wire:target="clearCart"
                class="mt-3 bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700 disabled:bg-slate-900 cursor-pointer">
                <span wire:loading.remove wire:target="clearCart">Hapus Semua</span>
                <span wire:loading wire:target="clearCart">Menghapus...</span>
            </button>
        @endif
    </div>
    @error ('voucher_code')
        <x-notification color="bg-red-700">Voucher Kamu Ga Tersedia Nih :(</x-notification>
    @endif
</div>