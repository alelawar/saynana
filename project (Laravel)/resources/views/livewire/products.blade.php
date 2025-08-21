<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="flex justify-between container mx-auto p-4">
        @forelse ($products as $product)
            <div class=" bg-white rounded-lg shadow-md overflow-hidden m-4">
                @if(Str::startsWith($product->img_url, 'db/'))
                    <img src="{{ asset('storage/' . $product->img_url) }}" alt="{{ $product->name }}"
                        class="w-full h-48 object-cover">
                @else
                    <img src="{{ asset($product->img_url) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-5 w-full">
                    <h5 class="text-xl font-semibold mb-2 text-gray-900">{{ $product->name }}</h5>
                    <p class="text-gray-600 mb-3 text-sm">{{ $product->description }}</p>
                    <p class="text-lg font-bold text-green-600 mb-4">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <button
                        class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-200 disabled:bg-slate-900 cursor-pointer"
                        wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled"
                        wire:target="addToCart({{ $product->id }})">
                        <span wire:loading.remove wire:target="addToCart({{ $product->id }})">Add To Cart</span>
                        <span wire:loading wire:target="addToCart({{ $product->id }})">Adding....</span>
                    </button>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 py-8">
                No products available
            </div>
        @endforelse
    </div>
</div>