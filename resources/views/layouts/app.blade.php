<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val));"
      :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iLab Monitoring') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">

    {{-- Jadikan wrapper utama punya Alpine state --}}
    <div x-data="{ open: true }" x-on:toggle-sidebar.window="open = !open"
        class="min-h-screen flex transition-all duration-500">
        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Konten utama --}}
        <div class="flex-1 flex flex-col transition-all duration-500 ease-in-out" :class="open ? 'ml-64' : 'ml-20'">

            {{-- Navbar --}}
            @include('layouts.partials.navbar')

            {{-- Isi halaman --}}
            <main class="flex-1 p-6 bg-gray-100 dark:bg-gray-900">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
