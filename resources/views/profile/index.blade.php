<x-layouts.app>
    <x-header />

    <div class="max-w-6xl mx-auto p-6">
        {{-- Profile User --}}
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-2xl font-bold mb-4">Profil Saya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Alamat:</strong> {{ $user->adress ?? 'Belum ada' }}</p>
                <p><strong>Telepon:</strong> {{ $user->phone ?? 'Belum ada' }}</p>
                {{-- <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p> --}}
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>

        {{-- Riwayat Order --}}
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-2xl font-bold mb-4">Riwayat Order</h2>
            @forelse ($orders as $order)
                <div class="border-b py-4">
                    <p><strong>Kode Order:</strong> {{ $order->code }}</p>
                    <p><strong>Status:</strong> {{ $order->status }}</p>
                    <p><strong>Total:</strong> Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                    <p><strong>Produk:</strong></p>
                    <ul class="list-disc pl-6">
                        @foreach ($order->items as $item)
                            <li>{{ $item->product->name }} (x{{ $item->qty }}) -
                                Rp{{ number_format($item->price, 0, ',', '.') }}</li>
                        @endforeach
                    </ul>

                    <a href="/checkout/detail/{{ $order->code }}">Detail</a>
                </div>
            @empty
                <p class="text-gray-500">Belum ada riwayat order.</p>
            @endforelse
        </div>

        {{-- Voucher User --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold mb-4">Voucher Saya</h2>
            <div class="flex items-center gap-2">
                <span id="voucher-code" class="">
                    {{ $vouchers->voucher->code }}
                </span>
                <button onclick="copyVoucher()" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Salin
                </button>
            </div>
            <span id="copy-msg" class="text-green-500 text-sm hidden">Tersalin ✅</span>
        </div>

        <script>
            function copyVoucher() {
                const code = document.getElementById('voucher-code').innerText;
                navigator.clipboard.writeText(code).then(() => {
                    const msg = document.getElementById('copy-msg');
                    msg.classList.remove('hidden');
                    setTimeout(() => {
                        msg.classList.add('hidden');
                    }, 1500); // hilang setelah 1,5 detik
                }).catch(err => {
                    console.error('Gagal menyalin teks: ', err);
                });
            }
        </script>

    </div>
</x-layouts.app>