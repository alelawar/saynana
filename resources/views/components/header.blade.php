<header class="fixed top-7 right-5 left-5">
        <nav class="bg-slate-100 rounded-2xl py-2 px-5 flex justify-between items-center relative">
            <div class="flex items-center gap-4">
                <a href="/shop" class="py-3 px-2.5 bg-slate-200 rounded-lg">Shop</a>
                <a href="/story">Find Store</a>
            </div>

            <!-- Logo di tengah absolute -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-20 h-10 overflow-hidden">
                <a href="/">
                    <img src="https://saynanaofficial.com/wp-content/uploads/2025/05/4000X4000-COKLAT-8-scaled.png"
                    alt="logo" class="">
                </a>
            </div>

            <div class="flex items-center gap-4">
                <a href="/story">Dapatkan Diskon</a>
               @livewire('cart')
                @auth()
                <a href="/profile" class="py-3 px-2.5 bg-slate-200 rounded-lg">Profile</a>
                    @else
                    <a href="/login" class="py-3 px-2.5 bg-slate-200 rounded-lg">Masuk</a>
                @endauth
            </div>
        </nav>

        <div class="" x-show="open">
        </div>

    </header>