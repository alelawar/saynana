<x-dashboard.layout title="Dashboard | Order">
    <h1 class="font-semibold">Ringkasan Chart Order dan Pendapatan</h1>

    <div class="grid md:grid-cols-4 grid-cols-2 p-2 gap-2 text-slate-800">
        <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-blue-400 text-xl md:text-2xl">{{$total_order ?? 0}}</p>
                </div>
                <p class="text-slate-600 text-xs text-center">Total Semua Order (Terkonfirmasi)
                </p>
            </div>
        </div>
       
        <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-green-400 md:text-2xl">Rp.{{ number_format($total_revenue, 0, ',', '.') ?? 0
                                }}
                    </p>
                </div>
                <p class="text-slate-600 text-xs text-center">Total Semua Pendapatan (Orderan Suksess/Selesai)</p>
            </div>
        </div>
         <div
            class="bg-white rounded-lg border border-slate-200 shadow-lg h-25 flex flex-col justify-center items-center p-2 relative">
            <div class="flex flex-col items-center gap-1">
                <div class="font-semibold text-lg">
                    <p class="text-red-500 text-xl md:text-2xl">{{$total_canceled ?? 0}}</p>
                </div>
                <p class="text-slate-600 text-xs text-center">Total Semua Order Dibatalkan
                </p>
            </div>
        </div>
    </div>

    <div x-data="{ showChart1: false, showChart2: false }" class="md:px-3 py-5 ">
        <div class="flex gap-3 mb-5 text-sm">
            <button @click="showChart1 = !showChart1"
                class="md:px-4 px-1.5 cursor-pointer py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                Lihat Chart Order
            </button>

            <button @click="showChart2 = !showChart2"
                class="md:px-4 px-1.5 cursor-pointer py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">
                Lihat Chart Penjualan
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 ">
            <!-- Chart 1 -->
            <div x-show="showChart1" x-transition class="bg-white p-4 rounded-xl shadow h-80 mb-10">
                <canvas id="chart_penjualan"></canvas>
            </div>

            <!-- Chart 2 -->
            <div x-show="showChart2" x-transition class="bg-white p-4 rounded-xl shadow h-80 mb-10">
                <canvas id="chart_penghasilan"></canvas>
            </div>
        </div>
    </div>

    <livewire:orders-table/>        
    <script>
        // Chart Penjualan
        new Chart(document.getElementById('chart_penjualan'), {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Jumlah Order',
                    data: @json($data),
                    backgroundColor: '#2196F3'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Chart Penghasilan
        new Chart(document.getElementById('chart_penghasilan'), {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Total Penjualan yang Selesai (Rp)',
                    data: @json($dataTotals ?? []),
                    borderColor: '#4CAF50',
                    backgroundColor: 'rgba(76, 175, 80, 0.2)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</x-dashboard.layout>