<x-layouts.app>
    <div class="min-h-screen relative flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-sm w-full space-y-8 relative z-10">
            <div class="text-center flex flex-col items-center gap-2 font-extrabold sour-gummy">
                <div class="text-5xl flex gap-2">
                    <h2 class="">
                        Log
                    </h2>
                    <p class="text-yellow-400">
                        in
                    </p>
                </div>
                <a href="/" class="text-yellow-400 text-xl">
                    Saynana
                </a>
            </div>

            <form class="mt-8 space-y-8" method="POST" action="#">
                @csrf
                <div class="space-y-4">
                    <x-auth.input name="email" label="Email address" type="email" placeholder="email" />
                    <x-auth.input name="password" label="Password" type="password" placeholder="password" />
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                            Ingat saya!
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="/register" class="font-medium border-b-1 hover:text-yellow-400">
                            Belum Punya Akun?
                        </a>
                    </div>
                </div>

                <div>
                    <x-auth.button name="masuk" />
                </div>
            </form>
        </div>

        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 pointer-events-none hidden md:block top-20">
                <!-- ITEM DI KANAN (TEKS) - berada di belakang atau depan sesuai z -->
                <img src="{{ asset('img/items/banana.png') }}" alt=""
                    class="absolute float w-[12%] bottom-10 left-0 rotate-25 z-0" />
                <img src="{{ asset('img/items/strawberry.png') }}" alt=""
                    class="absolute float w-[15%] left-1/6 blur-[3px] -rotate-25 top-1/3 z-0" />

                <!-- ITEM KIRI (IMAGE) -->
                <img src="{{ asset('img/items/banana-double.png') }}" alt=""
                    class="absolute float w-[15%] left-10 blur-[1px] top-10 rotate-25 z-20" />
                <img src="img/mini-cocholate-bar.png" alt="" class="absolute float w-[30%] top-0 left-[55%] z-0" />
                <img src="{{ asset('img/items/cocholate-bar.png') }}" alt=""
                    class="absolute float w-[20%] bottom-10 blur-[1px] right-1/6 rotate-90 z-20" />
                <img src="{{ asset('img/items/mini-cocholate-bar.png') }}" alt=""
                    class="absolute float w-[8%] blur-[3px] top-12 right-1/5 rotate-35 z-20" />
                <img src="{{ asset('img/items/choped-strawberry.png') }}" alt=""
                    class="absolute float w-[25%] top-1/4 -right-10 rotate-35 z-20" />
            </div>
        </div>
    </div>

</x-layouts.app>