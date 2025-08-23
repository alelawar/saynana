<x-dashboard.layout>
    <h1 class="font-semibold md:text-xl">Ringkasan Chart Produk</h1>
    {{-- <p class="text-slate-600 ">(Keseluruhan)</p> --}}
    <div class="grid md:grid-cols-4 grid-cols-2 p-2 gap-2 text-slate-800">
        <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-blue-400 text-xl md:text-2xl">{{$total_user ?? 0}}</p>
                </div>
                <p class="text-slate-600 text-xs text-center">Total Semua (Terdaftar)
                </p>
            </div>
        </div>
        <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-green-400 text-xl md:text-2xl"> Rp
                        {{ number_format($revenue_user, 0, ',', '.') }}
                    </p>
                </div>
                <p class="text-slate-600 text-xs text-center">Total Pendapatan Dari User (Selesai)
                </p>
            </div>
        </div>
        <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-blue-400 text-xl md:text-2xl">{{$total_user_voucher}}</p>
                </div>
                <p class="text-slate-600 text-xs text-center">Total Voucher Khusus User
                </p>
            </div>
        </div>
        <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-blue-400 text-xl md:text-2xl">{{$total_voucher}}</p>
                </div>
                <p class="text-slate-600 text-xs text-center">Total Voucher Aktif
                </p>
            </div>
        </div>

    </div>
    <div x-data="{ showChart1: false, showChart2: false }" class="md:px-3 py-5 ">
        <div class="flex gap-3 text-sm">
            <button @click="showChart1 = !showChart1"
                class="md:px-4 px-1.5 cursor-pointer py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                Lihat Chart User Terdaftar
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
            <!-- Chart 1 -->
            <div x-show="showChart1" x-transition class="bg-white p-4 rounded-xl shadow h-80 mb-10">
                <canvas id="chart_user"></canvas>
            </div>
        </div>
    </div>

    <livewire:user-table />

    <div x-data="{ open: false }" class="my-3">
        <!-- Tombol -->
        <button @click="open = true"
            class="px-4 py-1.5 bg-blue-500 hover:bg-blue-600 shadow-xl rounded-lg text-white cursor-pointer">
            Tambahkan Voucher +
        </button>

        <!-- Modal -->
        <div x-show="open" x-transition class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
            <div @click.away="open = false" x-transition.scale
                class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6">
                <!-- Header Modal -->
                <div class="flex justify-between items-center border-b pb-2 mb-4">
                    <h2 class="md:text-lg font-semibold text-gray-700">
                        Buat Voucher Baru
                        <p class="text-xs md:text-sm text-slate-500">(Untuk Umum)</p>
                    </h2>
                    <button @click="open = false"
                        class="text-gray-400 hover:text-gray-600 cursor-pointer">&times;</button>
                </div>

                <!-- Isi Modal -->
                <form class="space-y-4" method="POST" action="{{ route("vouchers.store") }}">
                    @csrf
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Code Voucher</label>
                        <input type="text" name="code"
                            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Diskon (%)</label>
                        <input type="number" name="percentage"
                            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Max Penggunaan</label>
                        <input type="number" name="max_uses" value=""
                            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="open = false"
                            class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100 cursor-pointer">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 cursor-pointer">
                            Buat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto my-10">
        <table class="w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-12">
                        NO
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                        Code
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-24">
                        Persentasi
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-20">
                        Max Pengunaan
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-20">
                        Pemakaian
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-20">
                        Khusus User
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-28">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($vouchers as $voucher)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-3 py-3 whitespace-nowrap  text-gray-900">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <div class="text-sm md:text-base font-medium text-gray-900 mb-1">
                                {{ $voucher->code }}
                            </div>
                        </td>

                        <td class="px-3 py-3 whitespace-nowrap">
                            <div class="text-sm md:text-base font-semibold text-green-600">
                                {{ $voucher->percentage }}%
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-red-500 font-semibold rounded-full text-xs md:text-sm">
                                {{ $voucher->max_uses }}
                            </span>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <span
                                class="inline-flex px-2 py-1  font-semibold rounded-full text-green-800 bg-green-100 text-xs md:text-sm">
                                {{ $voucher->uses }}
                            </span>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <div class="text-sm md:text-base font-medium text-gray-900 mb-1">
                                {{ $voucher->owner->name ?? '-' }}
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap font-medium">
                            <div class="flex gap-2 items-center">
                                <div x-data="{ open: false }">
                                    <!-- Tombol -->
                                    <button @click="open = true" class="text-blue-600 hover:text-blue-700 cursor-pointer">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div x-show="open" x-transition
                                        class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
                                        <div @click.away="open = false" x-transition.scale
                                            class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6">
                                            <!-- Header Modal -->
                                            <div class="flex justify-between items-center border-b pb-2 mb-4">
                                                <h2 class="md:text-lg font-semibold text-gray-700">
                                                    Edit Voucher {{ $voucher->code }}
                                                    {{-- <p class="text-xs md:text-sm text-slate-500">(Hanya Untuk User ini)
                                                    </p> --}}
                                                </h2>
                                                <button @click="open = false"
                                                    class="text-gray-400 hover:text-gray-600 cursor-pointer">&times;</button>
                                            </div>

                                            <!-- Isi Modal -->
                                            <form class="space-y-4" method="POST"
                                                action="{{ route('vouchers.update', [$voucher->id]) }}">
                                                @method('PUT')
                                                @csrf
                                                <div>
                                                    <label class="block text-sm text-gray-600 mb-1">Code Voucher</label>
                                                    <input type="text" name="code" disabled value="{{ $voucher->code }}"
                                                        class="w-full border rounded-lg bg-slate-200 cursor-not-allowed px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
                                                </div>
                                                <div>
                                                    <label class="block text-sm text-gray-600 mb-1">Diskon (%)</label>
                                                    <input type="number" name="percentage"
                                                        value="{{ $voucher->percentage }}"
                                                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
                                                </div>

                                                @if ($voucher->owner)
                                                    <div>
                                                        <label class="block text-sm text-gray-600 mb-1">Voucher Untuk</label>
                                                        <input disabled value="{{ $voucher->owner->name }}"
                                                            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-outline-none cursor-not-allowed bg-gray-200">
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm text-gray-600 mb-1">Max Penggunaan</label>
                                                        <input  name="max_uses" disabled value="{{ $voucher->max_uses }} (default)"
                                                            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 outline-none bg-gray-200 cursor-not-allowed">
                                                    </div>
                                                @else

                                                    <div>
                                                        <label class="block text-sm text-gray-600 mb-1">Max Penggunaan</label>
                                                        <input type="number" name="max_uses" value="{{ $voucher->max_uses }}"
                                                            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 outline-none">
                                                    </div>
                                                @endif
                                                <div class="flex justify-end gap-2">
                                                    <button type="button" @click="open = false"
                                                        class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100 cursor-pointer">
                                                        Batal
                                                    </button>
                                                    <button type="submit"
                                                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 cursor-pointer">
                                                        Simpan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div x-data="{ showConfirm: false }">
                                    <!-- Delete Button -->
                                    <button @click="showConfirm = true"
                                        class="text-red-600 hover:text-red-800 transition-colors duration-200 cursor-pointer text-xs md:text-sm">
                                        Delete
                                    </button>

                                    <!-- Confirmation Modal -->
                                    <div x-show="showConfirm"
                                        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 min-h-screen"
                                        @click="showConfirm = false" aria-modal="true" role="dialog">
                                        <div @click.stop class="bg-white rounded-lg p-6 max-w-sm w-full mx-4 shadow-xl">
                                            <div class="mb-4">
                                                <h3 class="text-lg font-semibold text-gray-900">
                                                    Hapus Produk
                                                </h3>
                                                <p class="text-sm text-gray-500 mt-1">
                                                    Yakin mau hapus produk ini?
                                                </p>
                                            </div>

                                            <div class="flex justify-end space-x-3">
                                                <button @click="showConfirm = false" type="button"
                                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Batal
                                                </button>

                                                <form action="{{ route('vouchers.destroy', $voucher->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                        Ya, Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2M4 13h2m13-6l-4 4m0 0l-4-4m4 4V3">
                                    </path>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900">Voucher Tidak Ditemukan </h3>
                                <p class="text-sm text-gray-500">Coba Buat Voucher</p>
                                <a href="{{ route('products.create') }}"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700  focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Add Product
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        new Chart(document.getElementById('chart_user'), {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'User Terdaftar',
                    data: @json($data),
                    backgroundColor: '#2196F3'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</x-dashboard.layout>