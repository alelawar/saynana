<x-dashboard.layout>
    <h1 class="font-semibold md:text-xl">Ringkasan Chart Produk</h1>
    <p class="text-slate-600 ">(Keseluruhan)</p>
    <div class="grid md:grid-cols-4 grid-cols-2 p-2 gap-2 text-slate-800">
        <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-blue-400 text-xl md:text-2xl">{{$total_product ?? 0}}</p>
                </div>
                <p class="text-slate-600 text-xs text-center">Total Semua Stock Produk
                </p>
            </div>
        </div>
        <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-orange-400 text-xl md:text-2xl">{{$product_low_stock}}</p>
                </div>
                <p class="text-slate-600 text-xs text-center">Stok Produk Rendah
                </p>
            </div>
        </div>
        <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-red-400 text-xl md:text-2xl">{{$product_out_stock}}</p>
                </div>
                <p class="text-slate-600 text-xs text-center">Stok Produk Habis
                </p>
            </div>
        </div>
        <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-green-400 text-xl md:text-2xl">{{$product_selled}}</p>
                </div>
                <p class="text-slate-600 text-xs text-center">Total Produk Yang Terjual (Konfirmasi Order)
                </p>
            </div>
        </div>

    </div>
    <div x-data="{ showChart1: false, showChart2: false }" class="md:px-3 py-5 ">
        <div class="flex gap-3 mb-5 text-sm">
            <button @click="showChart1 = !showChart1"
                class="md:px-4 px-1.5 cursor-pointer py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                Lihat Chart Produk (Pie)
            </button>
            <button @click="showChart2 = !showChart2"
                class="md:px-4 px-1.5 cursor-pointer py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                Lihat Chart Produk (Bar)
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 ">
            <!-- Chart 1 -->
            <div x-show="showChart1" x-transition class="bg-white p-4 rounded-xl shadow h-80 mb-10">
                <canvas id="chart_produk"></canvas>
            </div>
            <div x-show="showChart2" x-transition class="bg-white p-4 rounded-xl shadow h-80 mb-10">
                <canvas id="chart_produk_bar"></canvas>
            </div>
        </div>
    </div>
    <div class="mb-4 text-right">
        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">
            ✏️ Create
        </a>
    </div>
    <livewire:product-table />
    <script>
        new Chart(document.getElementById('chart_produk'), {
            type: 'pie',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Produk Terjual',
                    data: @json($data),
                    backgroundColor: [
                        '#2196F3',
                        '#4CAF50',
                        '#FFC107',
                        '#F44336',
                        '#9C27B0'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
        new Chart(document.getElementById('chart_produk_bar'), {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Produk Terjual',
                    data: @json($data),
                    backgroundColor: [
                        '#2196F3',
                        '#4CAF50',
                        '#FFC107',
                        '#F44336',
                        '#9C27B0'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0 // biar ga ada koma
                        }
                    }
                }
            }
        });

    </script>
</x-dashboard.layout>