<x-dashboard.layout>
    <div class="flex items-center mb-4">
        <button type="button" onclick="window.history.back()"
            class="flex items-center text-gray-600 hover:text-gray-900 transition-colors cursor-pointer">
            <!-- Icon panah kiri -->
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <span>Kembali</span>
        </button>
    </div>

    <form action="{{ route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bg-gray-50 p-4 sm:p-6 rounded-lg border">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="text-base sm:text-lg">Informasi Produk</span>
            </h2>


            <div class="flex flex-col lg:flex-row gap-10 md:h-auto items-center">
                {{-- Gambar Produk --}}
                @if ($product->img_url)
                    <div class="w-50 h-full text-center shadow-6xl">
                        @if(Str::startsWith($product->img_url, 'db/'))
                            <img src="{{ asset('storage/' . $product->img_url) }}" alt="">
                        @else
                            <img src="{{ asset($product->img_url) ?? '' }}" alt="">
                        @endif

                        <input type="file" name="img_url" id="fileInput" class="hidden" accept="image/*">

                        <h2 class="text-base font-semibold text-gray-800 mb-1">Edit Foto</h2>
                        <p class="text-slate-600 text-sm">(optional)</p>
                        <p id="fileName" class="text-sm text-green-800 mt-1 italic"></p>
                    </div>
                @endif

                {{-- Form Produk --}}
                <div class="flex-1 w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                        {{-- Nama Produk --}}
                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
                            <input type="text" value="{{ $product->name }}" name="name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md text-gray-800 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Stock Produk --}}
                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Stock Produk</label>
                            <input type="number" value="{{ $product->stock }}" name="stock"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md text-gray-800 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        {{-- Harga Produk --}}
                        <div class="sm:col-span-2 lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga Produk</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2.5 text-gray-500 text-sm">Rp</span>
                                <input type="number" value="{{ number_format($product->price, 0, ',', '.') }}"
                                    name="price"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md text-gray-800 font-semibold text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>

                    {{-- Deskripsi Produk --}}
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Produk</label>
                        <textarea name="description" rows="4" placeholder="Tambahkan deskripsi produk..."
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-800 text-sm resize-y">{{ $product->description }}</textarea>
                    </div>

                    <!-- Tombol di bawah -->
                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button"
                            class="px-4 py-2 cursor-pointer bg-gray-200 text-gray-700 text-sm rounded-lg hover:bg-gray-300 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 cursor-pointer bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <script>
        const fileInput = document.getElementById('fileInput');
        const fileName = document.getElementById('fileName');
        const productImage = document.getElementById('productImage');

        // klik gambar -> buka file picker
        productImage.addEventListener('click', () => fileInput.click());

        // kalau ada file dipilih -> tampilkan nama file
        fileInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                fileName.textContent = "File dipilih: " + this.files[0].name;
            } else {
                fileName.textContent = "";
            }
        });
    </script>


</x-dashboard.layout>