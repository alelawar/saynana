<x-layouts.app>
    <div class="min-h-screen relative flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 z-10">

            <x-auth.heading heading1="Buat" heading2="akun!" href="login" action1="sudah punya akun?" action2="Log in!" />

            <form class="mt-8 space-y-6" method="POST" action="/register">
                @csrf
                <div class="space-y-4">
                    <x-auth.input name="name" label="Name" type="text" placeholder="Nama" :required="true" />
                    <x-auth.input name="email" label="Email address" type="email" placeholder="Email address"
                        :required="true" />
                    <x-auth.input name="password" type="password" label="Password" placeholder="Password" />
                    <x-auth.input name="password_confirmation" type="password" label="Confirm Password"
                        placeholder="Confirm Password" />

                </div>

                <div>
                    <x-auth.button name="Sign in" />
                </div>
            </form>
        </div>
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 pointer-events-none hidden md:block top-20">
                <!-- ITEM DI KANAN (TEKS) - berada di belakang atau depan sesuai z -->
                <img src="{{ asset('img/items/banana.png') }}" alt="" class="absolute float w-[12%] bottom-10 left-0 rotate-25 z-0" />
                <img src="{{ asset('img/items/strawberry.png') }}" alt="" class="absolute float w-[15%] left-1/6 blur-[3px] -rotate-25 top-1/3 z-0" />

                <!-- ITEM KIRI (IMAGE) -->
                <img src="{{ asset('img/items/banana-double.png') }}" alt="" class="absolute float w-[15%] left-10 blur-[1px] top-10 rotate-25 z-20" />
                <img src="img/mini-cocholate-bar.png" alt="" class="absolute float w-[30%] top-0 left-[55%] z-0" />
                <img src="{{ asset('img/items/cocholate-bar.png') }}" alt="" class="absolute float w-[20%] bottom-10 blur-[1px] right-1/6 rotate-90 z-20" />
                <img src="{{ asset('img/items/mini-cocholate-bar.png') }}" alt=""
                    class="absolute float w-[8%] blur-[3px] top-12 right-1/5 rotate-35 z-20" />
                <img src="{{ asset('img/items/choped-strawberry.png') }}" alt=""
                    class="absolute float w-[25%] top-1/4 -right-10 rotate-35 z-20" />
            </div>
        </div>
    </div>
    @error('name')
    <x-notification color="bg-red-700">{{ $message }}</x-notification>
    @enderror
    @error('email')
    <x-notification color="bg-red-700">{{ $message }}</x-notification>
    @enderror
    @error('password')
    <x-notification color="bg-red-700">{{ $message }}</x-notification>
    @enderror
</x-layouts.app>