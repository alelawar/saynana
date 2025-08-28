<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" />
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>

<body class="overflow-x-hidden">
    <main class="">
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