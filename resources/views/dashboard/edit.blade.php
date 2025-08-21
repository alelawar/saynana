<x-dashboard.layout title="Dashboard | Order Edit">
    <div class="flex items-center mb-4">
        <button type="button" onclick="window.history.back()"
            class="flex items-center text-gray-600 hover:text-gray-900 transition-colors">
            <!-- Icon panah kiri -->
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <span>Kembali</span>
        </button>
        <h1 class="text-xl font-bold ml-4">Edit Order #{{ $order->code }}</h1>
    </div>
    @livewire('order-edit', ['order' => $order])
</x-dashboard.layout>