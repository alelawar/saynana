<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-sm w-full space-y-8">

            <x-auth.heading heading="Sign in to your account" href="register" action="create a new account" />

            <form class="mt-8 space-y-6" method="POST" action="#">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <x-auth.input name="email" label="Email address" type="email" placeholder="Email address" />
                    <x-auth.input name="password" label="Password" type="password" placeholder="pw" />
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div>
                    <x-auth.button name="Sign in" />
                </div>
            </form>
        </div>
    </div>
  
</x-layouts.app>