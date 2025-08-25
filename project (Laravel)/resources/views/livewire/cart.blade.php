<div class="">
    {{-- INI SI BUTTON BUAT NGEAKTIFIN DIV CARTNYA --}}
      <button wire:click="toggleCart" wire:loading.attr="disabled" wire:target="toggleCart"
        class="flex items-center bg-[#2A1E13] px-3 rounded-lg md:rounded-2xl space-x-2 h-full">
        
        <!-- Icon Cart -->
        <span wire:loading.remove wire:target="toggleCart" class="flex items-center space-x-2">
            <i class="bi bi-cart3 text-white md:text-lg"></i>
            <span class="text-white text-xl">{{ $this->getTotalQuantity() }}</span>
        </span>

        <!-- Loading Spinner -->
        <span wire:loading wire:target="toggleCart" class="flex items-center justify-center text-white">
            <i class="bi bi-arrow-repeat animate-spin text-xl"></i>
        </span>
    </button>



<div id="cartOverlay" class="fixed inset-0 bg-black/50 z-50 {{ !$isOpen ? 'hidden' : '' }}">
    <!-- Sidebar Cart -->
    <div class="absolute right-0 top-0 h-[95dvh] w-full md:w-1/3 bg-white shadow-lg p-6 md:m-4 rounded-2xl">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-[#2A1E13]">
                <i class="bi bi-bag me-1"></i> Keranjang
            </h2>
            <button wire:click="toggleCart" wire:loading.attr="disabled" wire:target="toggleCart"
                class="text-2xl text-gray-600 flex items-center justify-center">
                <span wire:loading.remove wire:target="toggleCart">
                    <i class="bi bi-x-lg"></i>
                </span>
                <span wire:loading wire:target="toggleCart" class="animate-spin">
                    <i class="bi bi-arrow-repeat"></i>
                </span>
            </button>
        </div>

        <form action="/checkout" method="POST">
            @csrf
            <div class="mb-3">
                <label for="voucher_code" class="block mb-1 font-semibold">
                    <i class="bi bi-ticket-perforated me-1"></i> Voucher Code
                </label>
                <input type="text" name="voucher_code" id="voucher_code"
                        class="border border-gray-300 rounded px-3 py-2 w-full" placeholder="Masukkan voucher jika ada" autocomplete="off">
            </div>

            <!-- Isi Cart -->
            <div class="space-y-4">
                @if (!empty($cart))
                    @foreach ($cart as $productId => $item)
                        <div class="border-b pb-2">
                            <!-- Product info di atas -->
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[#3A1E13] flex-1 pr-2">
                                    {{ $item['name'] }} (x{{ $item['qty'] }})
                                </span>
                                <button type="button" 
                                        wire:click="removeItem('{{ $productId }}')" 
                                        wire:loading.attr="disabled" 
                                        wire:target="removeItem('{{ $productId }}')" 
                                        class="bg-[#3A1E13] text-white px-2 py-0.5 rounded cursor-pointer disabled:bg-slate-900 flex-shrink-0">
                                    <span wire:loading.remove wire:target="removeItem('{{ $productId }}')">
                                        <i class="bi bi-dash-lg"></i>
                                    </span>
                                    <span wire:loading wire:target="removeItem('{{ $productId }}')">...</span>
                                </button>
                            </div>
                            
                            <!-- Harga di bawah, rata kanan -->
                            <div class="text-left">
                                <span class="font-semibold text-[#3A1E13]">
                                    Rp{{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                                </span>
                            </div>
                            
                            <!-- Hidden inputs tetap sama -->
                            <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $productId }}">
                            <input type="hidden" name="items[{{ $loop->index }}][qty]" value="{{ $item['qty'] }}">
                            <input type="hidden" name="items[{{ $loop->index }}][price]" value="{{ $item['price'] }}">
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500">
                        <i class="bi bi-cart-x me-1"></i> Keranjang Kosong
                    </p>
                @endif
            </div>

            <!-- Footer -->
            <div class="mt-6 border-t pt-4 flex flex-col gap-2">
                @php
                    $total = 0;
                    if (!empty($cart)) {
                        foreach ($cart as $item) {
                            $total += $item['price'] * $item['qty'];
                        }
                    }
                @endphp
                <div class="flex justify-between mb-4">
                    <span><i class="bi bi-receipt me-1"></i> Total</span>
                    <span class="font-bold">Rp.{{ number_format($total, 0, ',', '.') }}</span>
                </div>
                @if (!empty($cart))
                    <button type="button" wire:click="clearCart" wire:loading.attr="disabled" wire:target="clearCart"
                        class="mt-3 w-full bg-red-600 text-white px-4 py-1 rounded-lg hover:bg-red-700 disabled:bg-slate-900 cursor-pointer">
                            <span wire:loading.remove wire:target="clearCart">
                                <i class="bi bi-trash3 me-1"></i> Hapus Semua
                            </span>
                            <span wire:loading wire:target="clearCart">Menghapus...</span>
                    </button>
                @endif
                <button type="submit" 
                    class="w-full py-2 rounded-lg flex items-center justify-center 
                    {{ empty($cart) ? 'bg-gray-400 cursor-not-allowed' : 'bg-[#2A1E13] hover:bg-[#57352C] text-white' }}" 
                    {{ empty($cart) ? 'disabled' : '' }}>
                    
                    <i class="bi bi-bag-check me-1"></i> Checkout
                </button>
            </div>
        </form>
    </div>
</div>


    @error ('voucher_code')
        <x-notification color="bg-red-700">Voucher Kamu Ga Tersedia Nih :(</x-notification>
    @endif
</div>