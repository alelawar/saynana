<div>
    {{-- In work, do what you enjoy. --}}

    <!-- Search and Filter Section -->
    <div class="my-5 mb-6 bg-white p-6 rounded-lg shadow-sm border">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <!-- Search Input -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search by name or email..."
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Filter Dropdown -->
            <div>
                <select wire:model.live="filterBy"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="all">All Users</option>
                    <option value="high_orders">High Orders > 5 </option>
                    <option value="low_orders">Low Orders < 5 </option>
                    <option value="high_revenue">High Revenue > 300k</option>
                    <option value="low_revenue">Low Revenue < 300k </option>
                    <option value="no_orders">No Orders</option>
                </select>
            </div>

            <!-- Per Page -->
            <div class="flex items-center gap-2">
                <select wire:model.live="perPage"
                    class="block px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="5">5 per page</option>
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                </select>
                <button wire:click="resetFilters"
                    class="px-3 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                    Reset
                </button>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm text-gray-600">
            <div>Total Users: <span class="font-semibold text-gray-900">{{ $users->total() }}</span></div>
            <div>Showing: <span class="font-semibold text-gray-900">{{ $users->count() }}</span></div>
            <div>Current Filter: <span class="font-semibold text-indigo-600">
                    {{ ucwords(str_replace('_', ' ', $filterBy)) }}
                </span></div>
            <div>Sort: <span class="font-semibold text-indigo-600">
                    {{ ucwords(str_replace('_', ' ', $sortBy)) }}
                    ({{ $sortDirection === 'asc' ? '↑' : '↓' }})
                </span></div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-sm border">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-12">
                        NO
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                        <button wire:click="sortBy('name')"
                            class="flex items-center gap-1 hover:text-gray-700 transition-colors">
                            Nama
                        </button>
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-24">
                        <button wire:click="sortBy('email')"
                            class="flex items-center gap-1 hover:text-gray-700 transition-colors">
                            Email
                        </button>
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-20">
                        <button wire:click="sortBy('order_count')"
                            class="flex items-center gap-1 hover:text-gray-700 transition-colors">
                            Jumlah Order
                        </button>
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-20">
                        <button wire:click="sortBy('total_revenue')"
                            class="flex items-center gap-1 hover:text-gray-700 transition-colors">
                            Total Pengeluaran
                        </button>
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-28">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-3 py-3 whitespace-nowrap text-gray-900">
                            {{ $users->firstItem() + $loop->index }}
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <div class="text-sm md:text-base font-medium text-gray-900 mb-1">
                                {{ $user->name }}
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <div class="text-sm md:text-base font-semibold text-blue-600">
                                {{ $user->email }}
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 font-semibold rounded-full text-xs md:text-sm
                                                    @if($user->order_count >= 10) text-green-800 bg-green-100
                                                    @elseif($user->order_count >= 5) text-yellow-800 bg-yellow-100
                                                    @elseif($user->order_count > 0) text-blue-800 bg-blue-100
                                                    @else text-gray-800 bg-gray-100 @endif">
                                {{ $user->order_count ?? 0 }}
                            </span>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <div class="text-sm md:text-base font-semibold 
                                                    @if($user->total_revenue >= 5000000) text-green-600
                                                    @elseif($user->total_revenue >= 1000000) text-blue-600
                                                    @elseif($user->total_revenue > 0) text-yellow-600
                                                    @else text-gray-500 @endif">
                                Rp {{ number_format($user->total_revenue ?? 0, 0, ',', '.') }}
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap font-medium">
                            <div class="flex items-center text-center gap-2">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="text-blue-600 hover:text-blue-900 transition-colors text-xs md:text-sm">
                                    Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                @if($search || $filterBy !== 'all')
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                                        </path>
                                    </svg>
                                    <h3 class="text-lg font-medium text-gray-900">User Tidak Ditemukan</h3>
                                    <p class="text-sm text-gray-500">Coba Cari Filtering Yang Lain.</p>
                                    <button wire:click="resetFilters"
                                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition-colors">
                                        Reset
                                    </button>
                                @else
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                        </path>
                                    </svg>
                                    <h3 class="text-lg font-medium text-gray-900">No users found</h3>
                                    <p class="text-sm text-gray-500">There are no users in the system yet.</p>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>



    </div>
    @if($users->hasPages())
        <div class="px-4 py-3 flex items-center justify-between border-t bg-gray-50 sm:px-6 flex-1">

            {{-- Info Section --}}
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ $users->firstItem() ?? 0 }}</span>
                    to
                    <span class="font-medium">{{ $users->lastItem() ?? 0 }}</span>
                    of
                    <span class="font-medium">{{ $users->total() }}</span>
                    results
                </p>
            </div>

            {{-- Pagination --}}
            <div class="flex flex-1 justify-between sm:justify-end w-full">
                {{-- Previous --}}
                @if ($users->onFirstPage())
                    <span
                        class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default rounded-md">
                        <svg class="h-4 w-4 sm:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293  3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0  010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="hidden sm:inline">Previous</span>
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled"
                        class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md  cursor-pointer hover:text-gray-800 hover:bg-gray-50">
                        <svg class="h-4 w-4 sm:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0  010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="hidden sm:inline">Previous</span>
                    </button>
                @endif

                {{-- Numbered Pages (hanya muncul di layar sm ke atas) --}}
                <div class="hidden sm:flex sm:mx-2 gap-1 cursor-pointer">
                    @php
                        $start = max($users->currentPage() - 2, 1);
                        $end = min($start + 4, $users->lastPage());
                        $start = max($end - 4, 1);
                    @endphp

                    @if($start > 1)
                        <button wire:click="gotoPage(1)"
                            class="px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 hover:bg-gray-50 rounded-md cursor-pointer">
                            1
                        </button>
                        @if($start > 2)
                            <span class="px-3 py-2 text-sm text-gray-400">...</span>
                        @endif
                    @endif

                    @for ($i = $start; $i <= $end; $i++)
                        @if ($i == $users->currentPage())
                            <span
                                class="px-3 py-2 text-sm font-medium text-white bg-indigo-600 border border-indigo-600 rounded-md">
                                {{ $i }}
                            </span>
                        @else
                            <button wire:click="gotoPage({{ $i }})"
                                class="px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 hover:bg-gray-50 rounded-md cursor-pointer">
                                {{ $i }}
                            </button>
                        @endif
                    @endfor

                    @if($end < $users->lastPage())
                        @if($end < $users->lastPage() - 1)
                            <span class="px-3 py-2 text-sm text-gray-400">...</span>
                        @endif
                        <button wire:click="gotoPage({{ $users->lastPage() }})"
                            class="px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 hover:bg-gray-50 rounded-md">
                            {{ $users->lastPage() }}
                        </button>
                    @endif
                </div>

                {{-- Next --}}
                @if ($users->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled"
                        class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md hover:text-gray-800 hover:bg-gray-50">
                        <span class="hidden sm:inline">Next</span>
                        <svg class="h-4 w-4 sm:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @else
                    <span
                        class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default rounded-md">
                        <span class="hidden sm:inline">Next</span>
                        <svg class="h-4 w-4 sm:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0   010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                @endif
            </div>
        </div>
    @endif

    <!-- Loading Indicator -->
    <div wire:loading.flex class="fixed inset-0 bg-black/25 z-50 flex justify-center items-center">
        <div class="bg-white p-4 rounded-lg shadow-lg flex items-center gap-3">
            <svg class="animate-spin h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 
                0 5.373 0 12h4zm2 5.291A7.962 
                7.962 0 014 12H0c0 3.042 1.135 
                5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <span class="text-gray-700 font-medium">Loading...</span>
        </div>
    </div>

</div>