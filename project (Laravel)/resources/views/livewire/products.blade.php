<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <section class="">
        <!-- Curve atas -->
        <div class="relative bottom-6 ml-[-50%] h-[200px] w-[200%] rounded-t-[100%] bg-gradient-to-b bg-white"></div>

        <!-- Isi konten -->
        <div class="relative -top-24 z-10 mx-auto overflow-hidden">
            <div class="text-center mb-12">
                <span class="px-4 py-2 bg-[#57352C] text-white rounded-full text-lg">produk kita</span>
                <h2 class="mt-4 text-3xl md:text-5xl sour-gummy text-[#3A1E13]">
                    Rasakan Keriuknya, Nikmati Manisnya!
                </h2>
            </div>

            <!-- Card Produk -->
            <div class="px-6 lg:px-16 max-w-7xl mx-auto overflow-x-auto custom-scrollbar smooth-scroll snap-x">
                <div class="grid grid-cols-4 gap-6 min-w-[1000px] pb-10">
                    @forelse ($products as $product)
                        <div tabindex="0"
                            class=" flex flex-col items-center p-6 rounded-2xl text-center shadow-lg relative group overflow-hidden transition-all duration-300 focus:outline-none snap-center focus:shadow-3xl text-white shadow-amber-200" style="background-color: {{ $product->bg_color }}">
                            <!-- Bintang -->
                            <div
                                class="text-sm transition-transform duration-300 group-hover:-translate-y-12 group-focus-within:-translate-y-12 text-white">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <!-- Judul -->
                            <div
                                class="transition-transform duration-300 group-hover:-translate-y-6 group-focus-within:-translate-y-6">
                                <h3 class="font-bold mt-2">{{$product->name}}</h3>
                                <p class="text-sm">pisang kering yang difermentasi</p>
                            </div>

                            <!-- Produk utama -->
                            @if(Str::startsWith($product->img_url, 'db/'))
                                <img src="{{ asset('storage/' . $product->img_url) }}" alt="Hero Image"
                                    class="w-44 h-auto object-cover z-20 relative transition-all duration-300 group-hover:-translate-y-6 group-hover:scale-75 group-hover:-rotate-8 group-focus-within:-translate-y-6 group-focus-within:scale-75 group-focus-within:-rotate-8" />
                            @else
                                <img src="{{ asset($product->img_url) ?? '' }}" alt="Hero Image"
                                    class="w-44 h-auto object-cover z-20 relative transition-all duration-300 group-hover:-translate-y-6 group-hover:scale-75 group-hover:-rotate-8 group-focus-within:-translate-y-6 group-focus-within:scale-75 group-focus-within:-rotate-8" />
                            @endif

                            <!-- Buah di belakang -->
                            <div class="absolute inset-0 flex items-center justify-center z-10">
                                <img src="{{ asset('img/items/banana.png') }}" alt="sliced banana"
                                    class="w-20 h-auto object-cover absolute opacity-0 scale-50 transition-all duration-500 group-hover:translate-x-16 group-hover:-translate-y-12 group-hover:opacity-100 group-hover:scale-100 group-focus-within:translate-x-16 group-focus-within:-translate-y-12 group-focus-within:opacity-100 group-focus-within:scale-100" />

                                <img src="{{ asset('img/items/cocholate-bar.png') }}" alt="banana"
                                    class="w-36 h-auto object-cover opacity-0 blur-[1px] scale-50 -rotate-30 translate-y-4 transition-all duration-500 group-hover:-translate-x-20 group-hover:opacity-100 group-hover:scale-100 group-focus-within:-translate-x-20 group-focus-within:opacity-100 group-focus-within:scale-100" />

                                <img src="{{ asset('img/items/strawberry.png') }}" alt="two sliced banana"
                                    class="w-24 h-auto object-cover absolute bottom-16 right-4 opacity-0 scale-50 transition-all duration-500 group-hover:opacity-100 group-hover:scale-100 group-focus-within:opacity-100 group-focus-within:scale-100" />
                            </div>

                            <!-- Tombol -->
                            <div
                                class="absolute bottom-4 flex gap-8 translate-y-16 transition-transform duration-300 z-30 group-hover:translate-y-0 group-focus-within:translate-y-0">

                                <button wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled"
                                    class="bg-white text-[#3A1E13] px-4 py-2 rounded-full shadow font-semibold hover:bg-yellow-100 transition disabled:bg-slate-500">
                                    + <i class="bi bi-cart3"></i>
                                    <span class="" wire:loading.remove wire:target="addToCart({{ $product->id }})">
                                        Rp.{{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                    <span wire:loading wire:target="addToCart({{ $product->id }})">Menambahkan..</span>
                                </button>
                            </div>
                        </div>
                    @empty

                    @endforelse
                    <!-- Card 1 -->

                </div>
            </div>

            <!-- Get discount -->
            @auth
            @else
                <div class="bg-yellow-100 w-screen py-12 mt-12">
                    <div class="container mx-auto flex md:flex-row items-center justify-between px-6 md:px-12 relative">
                        <!-- Text Kiri -->
                        <div class="text-center md:text-left md:w-1/2 space-y-4 relative">
                            <!-- Dekorasi pisang kiri - moved to back -->
                            <img src="{{ asset('img/items/strawberry.png')  }}" alt="pisang kiri"
                                class="absolute z-0 inset-0 -left-16 -top-20 blur-[1px] rotate-15 w-28 md:w-36 h-auto" />

                            <!-- Judul -->
                            <h2 class="text-2xl md:text-4xl font-bold relative z-10 leading-snug">
                                Diskon Pengguna <span class="text-yellow-400">Baru!</span>
                            </h2>

                            <!-- Paragraf -->
                            <p class="text-sm md:text-base opacity-75 relative z-10">
                                Bergabunglah Dengan Kami Sekarang & Nikmati Keuntungan
                                Eksklusif di Setiap Momen Belanja Anda!
                            </p>

                            <!-- Tombol -->
                            <a href="login"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition relative z-10">
                                Dapatkan sekarang!
                            </a>
                        </div>

                        <!-- Gambar Kanan -->
                        <div class="relative hidden md:w-1/2 md:flex justify-center mt-8 md:mt-0">

                            <!-- Produk utama -->
                            <img src="{{ asset('img/product/sale-pisang-milk.png') }}" alt="Produk"
                                class="w-36 rotate-20 h-auto relative left-20 z-10" />

                            <!-- Pisang dekorasi -->
                            <img src="{{ asset('img/items/banana.png') }}" alt="pisang kanan"
                                class="absolute -right-12 -bottom-14 blur-[1px] rotate-12 scale-x-[-1] w-20 md:w-28 h-auto z-20" />

                            <img src="{{ asset('img/items/banana-double.png') }}" alt="pisang bawah kecil"
                                class="absolute -bottom-4 left-16 md:left-32 -rotate-16 w-32 h-auto z-20" />

                            <!-- Badge kecil -->
                            <span
                                class="absolute top-8 left-0 md:left-16 bg-white px-3 py-1 rounded-full text-xs font-medium shadow z-30">
                                Banyak <span class="font-bold text-red-500">Diskon</span>
                            </span>

                            <span
                                class="absolute bottom-8 right-0 md:right-12 bg-white text-red-500 px-3 py-1 rounded-full text-xs font-semibold shadow z-30">
                                Rasanya Enak 😋
                            </span>
                        </div>
                    </div>
                </div>
            @endauth


        </div>
    </section>
</div>