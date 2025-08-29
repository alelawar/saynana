<section
    class="min-h-[100dvh] bg-radial from-yellow-200 via-yellow-300 to-yellow-500 overflow-hidden flex items-center">
    <!-- SEBENERNYA INI GAUSAH DI KASIH HEIGHT KARENA DIA BAKALAN NYESUAIN UKURAN / H-FIT JADI MESKIPUN DIBUKA DI LAPTOP YG PANJANG MISAL (1800*3200) ITU GABAKAL ANCUR SI ITEM NYA (KEPENCAR) -->
    <div
        class="relative flex flex-col-reverse md:flex-row py-3 px-4 sm:py-4 sm:px-8 md:py-5 md:px-12 lg:px-20 items-center justify-evenly sm:gap-4 md:gap-5 max-w-7xl mx-auto">
        <div
            class="text-sm sm:text-base md:text-lg lg:text-xl w-full lg:w-1/2 z-10 mt-8 sm:mt-12 md:mt-16 lg:mt-20 md:mb-0 mb-20">
            <p class="mb-1 sm:mb-1.5 md:mb-2 font-medium">
                Dapatkan Diskon S.d 20% Untuk Pengguna Baru!!
            </p>

            <h1 class="text-5xl md:text-6xl xl:text-7xl font-extrabold text-orange-950 sour-gummy">
                Bangunkan Selera, Nikmati Tiap Gigitan
            </h1>

            <p class="my-3 sm:my-4 md:my-5">
                Nikmati renyahnya keripik pisang Saynana, camilan sehat yang
                dibuat dari pisang pilihan petani lokal Indonesia.
            </p>

            <a href="#product"
                class="inline-block px-3 py-1 sm:px-3.5 sm:py-1.5 md:px-4 md:py-1.5 bg-white rounded-full sm:text-base hover:bg-orange-950 hover:text-white transition-all duration-300 ease-in-out hover:scale-105">
                Beli Sekarang
            </a>
        </div>

        <!-- image hero (image wrapper jadi relative supaya mobile-dekorasi nunjuk ke image) -->
        <div class="flex items-center justify-center w-full lg:w-1/2 z-10  sm:mt-8  mt-20">
            <div class="relative w-full max-w-md lg:max-w-none">
                <img src="{{ asset('img/items/hero-image.png') }}" alt=""
                    class="object-cover float-slow w-full block relative z-10 float-rotate" />

                <!-- MOBILE DECORATIONS: muncul di <md, anchored ke image -->
                <div class="absolute inset-0 pointer-events-none block md:hidden">
                    <!-- sesuaikan posisi relatif ke image -->
                    <img src="{{ asset('img/items/banana.png') }}" alt=""
                        class="absolute float w-[18%] bottom-10 left-2 -rotate-25 z-11" />
                    <img src="{{ asset('img/items/cocholate-bar.png') }}" alt=""
                        class="absolute float w-[35%] bottom-15 right-2 rotate-95 z-11" />
                    <img src="{{ asset('img/items/strawberry.png') }}" alt=""
                        class="absolute float w-[35%] bottom-0 right-1/3 rotate-120 z-11" />
                    <img src="{{ asset('img/items/strawberry.png') }}" alt=""
                        class="absolute float-rotate w-[30%] top-2 -left-10 rotate-25 z-1" />
                    <img src="{{ asset('img/items/banana-double.png') }}" alt=""
                        class="absolute float w-[25%] top-2 left-1/2 rotate-25 z-1" />
                </div>
            </div>
        </div>

        <!-- DESKTOP/CANVAS DECORATIONS: muncul di >=md, absolute terhadap parent .relative (hero canvas) -->
        <div class="absolute inset-0 pointer-events-none hidden md:block">
            <!-- ITEM DI KANAN (TEKS) - berada di belakang atau depan sesuai z -->
            <img src="{{ asset('img/items/banana-double.png') }}" alt=""
                class="absolute float w-[15%] bottom-10 left-0 rotate-25 z-0" />
            <img src="{{ asset('img/items/choped-strawberry.png') }}" alt=""
                class="absolute float w-[25%] top-1/3 -left-20 z-0" />
            <img src="{{ asset('img/items/strawberry.png') }}" alt=""
                class="absolute float w-[25%] bottom-4 right-[35%] rotate-25 z-0" />

            <!-- ITEM KIRI (IMAGE) -->
            <img src="{{ asset('img/items/banana.png') }}" alt=""
                class="absolute float w-[10%] bottom-1/3 left-1/2 -rotate-25 z-20" />
            <img src="{{ asset('img/items/banana.png') }}" alt=""
                class="absolute float w-[8%] top-1/6 left-[46%] -rotate-25 z-0" />
            <img src="img/mini-cocholate-bar.png" alt="" class="absolute float w-[30%] top-0 left-[55%] z-0" />
            <img src="{{ asset('img/items/cocholate-bar.png') }}" alt=""
                class="absolute float w-[20%] top-[53%] right-15 rotate-90 z-20" />
            <img src="{{ asset('img/items/choped-strawberry.png') }}" alt=""
                class="absolute float w-[25%] top-1/4 -right-10 rotate-35 z-20" />
        </div>
    </div>
</section>