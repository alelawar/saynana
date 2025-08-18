<x-layouts.app>
    <x-header />

    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Detail Order</h1>

        {{-- Order Info --}}
        <div class="mb-6">
            <p><strong>Order Code:</strong> {{ $order->code }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Total Price:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
        </div>

        {{-- Data Order --}}
        @if($order->dataOrder)
            <div class="mb-6">
                <h2 class="text-xl font-semibold">Data Pemesan</h2>
                <p><strong>Nama:</strong> {{ $order->dataOrder->name }}</p>
                <p><strong>Email:</strong> {{ $order->dataOrder->email }}</p>
                <p><strong>Alamat:</strong> {{ $order->dataOrder->address_line }}</p>
                <p><strong>Kota:</strong> {{ $order->dataOrder->city->name ?? '-' }}</p>
                <p><strong>Provinsi:</strong> {{ $order->dataOrder->city->province->province ?? '-' }}</p>
                <p><strong>Telepon:</strong> {{ $order->dataOrder->phone ?? '-' }}</p>
            </div>
        @endif

        @if($order->shipping)
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Data Layanan</h2>
                <p><strong>Penyedia:</strong> {{ $order->shipping->shipping_provider }}</p>
                <p><strong>No.Resi:</strong> {{ $order->shipping->resi }}</p>
            </div>
        @endif

        {{-- Items --}}
        <div>
            <h2 class="text-xl font-semibold mb-2">Items</h2>
            <ul class="list-disc pl-6">
                @foreach($order->items as $item)
                    <li>
                        {{ $item->product->name ?? 'Produk tidak ditemukan' }}
                        (x{{ $item->quantity ?? 1 }})
                        - Rp {{ number_format($item->product->price ?? 0, 0, ',', '.') }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layouts.app>