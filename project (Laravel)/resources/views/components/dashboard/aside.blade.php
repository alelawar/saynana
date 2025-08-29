<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-yellow-50 border-r border-yellow-200 flex-shrink-0 transform transition-transform duration-200 ease-in-out lg:translate-x-0 lg:static lg:inset-0">

    <!-- Header -->
    <div class="flex items-center justify-between p-4 border-b border-yellow-200">
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-sm">{{Str::substr(auth()->user()->name, 0, 1)}}</span>
            </div>
            <span class="text-gray-900 font-medium">{{auth()->user()->name}}</span>
        </div>
        <!-- Close button for mobile -->
        <button @click="sidebarOpen = false" class="lg:hidden text-gray-500 hover:text-gray-900">
            <span class="text-xl">×</span>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
        <!-- Create Section -->
        <div class="mb-4">
            <a href="/" class="text-xs hover:text-black font-semibold text-gray-500 uppercase tracking-wider mb-5 block">
                Aplikasi
            </a>
            <a href="/dashboard" class="text-xs hover:text-black font-semibold text-gray-500 uppercase tracking-wider mb-5 block">
                Dashboard
            </a>
            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Buat Dan Cari</h3>
            <div class="space-y-1">
                <a href="/dashboard/products" class="flex items-center px-3 py-2 text-sm text-gray-700 rounded-md 
                       hover:bg-yellow-100 hover:text-gray-900 group
                       transition-all duration-200 ease-in-out transform hover:scale-[1.03]">
                    <i
                        class="mr-3 text-gray-500 group-hover:text-gray-900 bi bi-bag-check transition-colors duration-200"></i>
                    Daftar Produk
                </a>
                <a href="/dashboard/users" class="flex items-center px-3 py-2 text-sm text-gray-700 rounded-md 
                       hover:bg-yellow-100 hover:text-gray-900 group
                       transition-all duration-200 ease-in-out transform hover:scale-[1.03]">
                    <i
                        class="mr-3 text-gray-500 group-hover:text-gray-900 bi bi-person transition-colors duration-200"></i>
                    User & Voucher
                </a>
                <a href="/dashboard/orders" class="flex items-center px-3 py-2 text-sm text-gray-700 rounded-md 
                       hover:bg-yellow-100 hover:text-gray-900 group
                       transition-all duration-200 ease-in-out transform hover:scale-[1.03]">
                    <i
                        class="mr-3 text-gray-500 group-hover:text-gray-900 bi bi-box-seam transition-colors duration-200"></i>
                    Daftar Orderan
                </a>
            </div>

            <form action="/logout" method="POST" class="mt-5">
                @csrf
                <button type="submit" class="text-xs font-semibold text-red-500 uppercase tracking-wider mb-5 block
                       hover:text-red-700 transition-all duration-200 ease-in-out transform hover:scale-[1.05]">
                    <i class="bi bi-box-arrow-in-left"></i> Log-Out
                </button>
            </form>
        </div>
    </nav>

</aside>