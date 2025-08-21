<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="overflow-x-auto my-10">
        <table class="w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-12">
                        NO
                    </th>
                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                        Product
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-24">
                        Price
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-20">
                        Stock
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-20">
                        Terjual
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-20">
                        Pendapatan (Kotor)
                    </th>
                    <th
                        class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b w-28">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($products as $p)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-3 py-3 whitespace-nowrap  text-gray-900">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <div class="text-sm md:text-base font-medium text-gray-900 mb-1">
                                {{ $p->name }}
                            </div>
                            <div class="text-xs md:text-sm text-gray-500 line-clamp-2">
                                {{ Str::limit($p->description, 80) }}
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <div class="text-sm md:text-base font-semibold text-green-600">
                                Rp {{ number_format($p->price, 0, ',', '.') }}
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <span
                                class="inline-flex px-2 py-1  font-semibold rounded-full 
                                                {{ $p->stock > 5 ? 'bg-green-100 text-green-800' : ($p->stock > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }} text-xs md:text-sm">
                                {{ $p->stock }}
                            </span>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <span
                                class="inline-flex px-2 py-1  font-semibold rounded-full text-green-800 bg-green-100 text-xs md:text-sm">
                                {{ $p->sold_qty }}
                            </span>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <div class="text-sm md:text-base font-semibold text-blue-600">
                                Rp {{ number_format($p->price * $p->sold_qty, 0, ',', '.') }}
                            </div>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap font-medium">
                            <div class="flex gap-2 items-center">
                                <a href="{{ route('products.edit', $p->id) }}"
                                    class="text-blue-600 hover:text-blue-900 transition-colors text-xs md:text-sm mr-5">
                                    Edit
                                </a>
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

                                                <form action="{{ route('products.destroy', $p->id) }}" method="POST"
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
                                <h3 class="text-lg font-medium text-gray-900">No products found</h3>
                                <p class="text-sm text-gray-500">Get started by creating your first product.</p>
                                <a href="{{ route('products.create') }}"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md 
                                                          font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 
                                                          focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 
                                                          focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Add Product
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>