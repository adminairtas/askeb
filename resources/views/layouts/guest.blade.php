<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-ASKeb | ISTEK ICSADA Bojonegoro</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen flex flex-col justify-center items-center">

        <!-- Logo -->
        <div class="text-center mb-6">
            <img src="{{ asset('images/logo-istek.png') }}"
                 class="w-20 mx-auto mb-3">

            <h1 class="text-xl font-bold text-gray-800">
                E-ASKeb
            </h1>

            <p class="text-sm text-gray-500">
                ISTEK ICSADA BOJONEGORO
            </p>
        </div>

        <!-- Card Login -->
        <div class="w-full sm:max-w-md px-8 py-6 bg-white shadow-md rounded-lg">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <div class="mt-6 text-xs text-gray-400">
            © {{ date('Y') }} ISTEK ICSADA Bojonegoro
        </div>

    </div>

</body>
</html>