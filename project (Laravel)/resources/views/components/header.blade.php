
<header class="fixed top-0 left-0 w-screen  lg:px-16 lg:pt-6 z-50 font-medium ">
    <div
        class="bg-white shadow-[0_0_6px_rgba(0,0,0,0.5)] rounded-b-md lg:rounded-3xl mx-auto p-1.5 flex justify-between">
        <!-- Left Menu (Desktop) -->
        <nav class="hidden lg:flex space-x-4 w-1/3">
            <a href="/"
                class="text-[#3A1E13] hover:text-[#57352C] bg-[#3A1E13]/15 px-6 flex items-center rounded-2xl">Beranda</a>
            <a href="/search-order" class="text-[#3A1E13] hover:text-[#57352C] flex items-center">Cari Pesanan</a>
        </nav>

        <!-- Logo -->
        <div class="flex items-center  text-center">
            <a href="/">
                <img src="{{ asset('img/logo-saynana.png') }}" alt="logo_img" class="h-8 lg:h-14 w-auto" />
            </a>
        </div>

        <!-- Right Menu (Desktop) -->
        <nav class="hidden md:flex space-x-4 w-1/3 justify-end">
            @auth()
            <a href="/profile" class="text-[#3A1E13] hover:text-[#57352C] flex items-center">Profile</a>
                @else
            <a href="/login" class="text-[#3A1E13] hover:text-[#57352C] flex items-center">Dapatkan diskon</a>
            <a href="/login" class="text-[#3A1E13] hover:text-[#57352C] flex items-center">Masuk</a>
            @endauth
          
            <livewire:cart />
        </nav>

        <!-- Mobile Toggle Button -->
        <div class="flex space-x-2 lg:hidden">
            <!-- Cart Button -->
            <livewire:cart />
            <button class="lg:hidden bg-[#2A1E13] text-white lg:mr-8 md:mr-2 px-3 rounded-lg lg:rounded-2xl"
                onclick="toggleMenu()">
                ☰
            </button>
        </div>
    </div>

    <!-- Mobile Menu Popup -->
    <div id="mobileMenu" class="fixed inset-0 bg-white z-40 hidden flex flex-col p-6">
        <!-- Close Button -->
        <button class="self-end text-3xl text-[#2A1E13] mb-6" onclick="toggleMenu()">
            ✕
        </button>

        <!-- Menu Items (same as desktop) -->
        <nav class="flex flex-col space-y-6 text-lg">
            <a href="#" class="text-[#3A1E13] hover:text-[#57352C]">Beranda</a>
            <a href="/search-order" class="text-[#3A1E13] hover:text-[#57352C]">Cari Pesanan</a>
            
            @auth
            <a href="/profile" class="text-[#3A1E13] hover:text-[#57352C]">Profile</a>
            @else
                <a href="/login" class="text-[#3A1E13] hover:text-[#57352C]">Dapatkan diskon</a>
                <a href="/login" class="text-[#3A1E13] hover:text-[#57352C]">Masuk</a>
            @endauth
        </nav>
    </div>
    <!-- Cart Open -->

</header>

<script>
    function toggleMenu() {
        const menu = document.getElementById("mobileMenu");
        menu.classList.toggle("hidden");
    }
    function toggleCart() {
        document.getElementById("cartOverlay").classList.toggle("hidden");
    }
</script>