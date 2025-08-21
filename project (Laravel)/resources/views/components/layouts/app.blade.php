<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>

<body>
    <main class="mt-30">
        {{ $slot }}
    </main>
    @if (session('success'))
        <x-notification color="bg-green-700">{{ session('success') }}</x-notification>
    @endif
    @if (session('error'))
        <x-notification color="bg-red-700">{{ session('error') }}</x-notification>
    @endif
    @livewireScripts
</body>

</html>