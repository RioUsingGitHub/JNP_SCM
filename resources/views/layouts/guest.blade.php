<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-blue-100">
    @if (request()->routeIs('register'))
    <!-- Registration Page Layout -->
    <div class="flex items-center justify-center min-h-screen bg-blue-500"
        style="background-image: url('{{ asset('img/assets/package.png') }}'); background-size: cover; background-position: center;">
        <div class="flex bg-white shadow-md rounded-lg w-full max-w-4xl overflow-hidden">
            <!-- Image Section -->
            <div class="w-1/2 bg-gray-100">
                <img src="{{ asset('img/assets/package.png') }}" alt="Registration Image" class="w-full h-full object-cover">
            </div>
            <!-- Form Section -->
            <div class="w-1/2 p-8">
                {{ $slot }}
            </div>
        </div>
    </div>
    @else
    <!-- Login Page Layout -->
    <div class="min-h-screen flex items-center justify-center bg-blue-500"
        style="background-image: url('{{ asset('img/assets/package.png') }}'); background-size: cover; background-position: center;">
        <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 w-full max-w-sm mx-auto">
            {{ $slot }}
        </div>
    </div>
    @endif
</body>

</html>