<?php
// resources/views/layouts/app.blade.php
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Page Title' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        <!-- Mobile sidebar overlay -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 bg-black/30 lg:hidden"
            @click="sidebarOpen = false"></div>

        <!-- Sidebar -->
        <x-dashboard.aside />

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col overflow-hidden lg:ml-0 ">
            <!-- Top Navigation -->
            <header class="bg-white border-b border-gray-200 px-4 lg:px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <!-- Mobile menu button -->
                        <button @click="sidebarOpen = !sidebarOpen"
                            class="lg:hidden text-gray-500 hover:text-gray-900 focus:outline-none">
                            <span class="text-2xl">☰</span>
                        </button>
                        <h1 class="text-lg font-semibold text-gray-900">Dashboard</h1>
                    </div>
                    <div class="flex items-center space-x-2 lg:space-x-4">
                        <!-- Navigation - Hidden on small screens -->
                        <nav class="hidden md:flex space-x-4">
                            <a href="#" class="text-gray-900 px-3 py-2 text-sm font-medium">Dashboard</a>
                            <a href="/"
                                class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium">Application</a>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Scrollable Content Area -->
            <div class="flex-1 overflow-y-auto bg-gray-50 p-4 lg:p-6 ">
                <!-- Content akan diisi di sini -->
                {{ $slot }}
            </div>
        </main>
    </div>

    @livewireScripts
</body>

</html>