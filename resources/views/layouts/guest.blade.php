<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-figtree text-gray-900 antialiased bg-gray-100">
    @include('layouts.navigation')

    <main class="min-h-screen flex flex-col justify-center items-center pt-6">
        <div class="text-center mb-4">
            <p class="text-lg font-semibold">{{ $companyname }}</p>
        </div>

        <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-lg">
            {{ $slot }}
        </div>
    </main>

    @include('frontend.partials.footer')

    @livewireScripts
</body>

</html>
