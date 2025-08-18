<x-dashboard.layout title="Dashboard | Order Edit">
    <h1 class="text-xl font-bold mb-4">Edit Order #{{ $order->code }}</h1>
    @livewire('order-edit', ['order' => $order])
</x-dashboard.layout>