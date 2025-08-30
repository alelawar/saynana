<div>
    {{-- Filter Tabs --}}
    <div class="flex flex-wrap gap-2 mb-4">
        @foreach (['pending', 'paid', 'packing', 'shipping', 'success', 'canceled'] as $st)
            <button 
                wire:click="setStatus('{{ $st }}')"
                wire:loading.attr="disabled"
                wire:target="setStatus('{{ $st }}')"
                class="px-3 py-2 cursor-pointer md:px-4 rounded-lg text-sm font-medium flex-shrink-0
                {{ $status === $st ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} disabled:bg-red-600 disabled:text-white">
                
                {{-- Normal text saat tidak loading --}}
                <span wire:loading.remove wire:target="setStatus('{{ $st }}')">
                    {{ ucfirst($st) }}
                    @if(isset($statusCounts[$st]))
                        <span class="ml-1 px-1.5 py-0.5 text-xs rounded-full 
                            {{ $status === $st ? 'bg-blue-500 text-white' : 'bg-gray-400 text-white' }}">
                            {{ $statusCounts[$st] }}
                        </span>
                    @endif
                </span>

                {{-- Feedback text saat loading --}}
                <span wire:loading wire:target="setStatus('{{ $st }}')">
                    Proses....
                </span>
            </button>
        @endforeach
    </div>

    {{-- Search Bar --}}
    <div class="mb-4 flex flex-col sm:flex-row sm:items-center space-y-3 sm:space-y-0 sm:space-x-3">
        <div class="relative flex-1 max-w-md">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input 
                type="text" 
                wire:model.live.debounce.300ms="search"
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                placeholder="Search orders..."
            >
            @if($search)
                <button 
                    wire:click="clearSearch"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <svg class="w-4 h-4 text-gray-400 hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            @endif
        </div>
        
        @if($search)
            <div class="text-sm text-gray-600">
                Searching: <span class="font-medium">"{{ $search }}"</span>
            </div>
        @endif
    </div>

    {{-- Orders Table --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Order Code</th>
                    <th class="px-4 py-2">Customer</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 font-medium">#{{ $order->code }}</td>
                        <td class="px-4 py-2">{{ $order->dataOrder->name ?? '-' }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-xs
                                @switch($order->status)
                                    @case('pending') bg-yellow-200 text-yellow-800 @break
                                    @case('paid') bg-blue-200 text-blue-800 @break
                                    @case('packing') bg-purple-200 text-purple-800 @break
                                    @case('shipping') bg-orange-200 text-orange-800 @break
                                    @case('success') bg-green-200 text-green-800 @break
                                    @case('canceled') bg-red-200 text-red-800 @break
                                @endswitch">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-2 flex gap-2">
                            @if($order->status === 'pending')
                                <span class="text-gray-500 text-sm italic">
                                    Menunggu pembayaran, <br> data akan hilang dalam beberapa jam
                                </span>
                            @else
                                <a href="/dashboard/orders/{{ $order->id }}/edit" class="text-blue-600 hover:text-blue-800">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>

                                @if(in_array($order->status, ['success', 'canceled']))
                                <div x-data="{ showConfirm: false }">
                                    <!-- Delete Button -->
                                    <button 
                                        @click="showConfirm = true"
                                        class="text-red-600 hover:text-red-800 transition-colors duration-200 cursor-pointer">
                                    | <i class="bi bi-trash3"></i>
                                    </button>
                                    
                                    <!-- Confirmation Modal -->
                                    <div 
                                        x-show="showConfirm" 
                                        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                                        @click="showConfirm = false">
                                        
                                        <div 
                                            @click.stop
                                            class="bg-white rounded-lg p-6 max-w-sm mx-4 shadow-xl">
                                            
                                            <div class="flex items-center mb-4">
                                                <div class="ml-4">
                                                    <h3 class="text-lg font-medium text-gray-900">
                                                        Hapus Order
                                                    </h3>
                                                    <p class="text-sm text-gray-500 mt-1">
                                                        Yakin mau hapus order ini? Tindakan ini tidak bisa dibatalkan.
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="flex justify-end space-x-3">
                                                <button 
                                                    @click="showConfirm = false"
                                                    type="button" 
                                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Batal
                                                </button>
                                                
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button 
                                                        type="submit"
                                                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                        Ya, Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">
                            @if($search)
                                No orders found for "{{ $search }}" in {{ $status }} status.
                            @else
                                No orders found.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $orders->links('vendor.pagination.tailwind') }}
    </div>
</div>