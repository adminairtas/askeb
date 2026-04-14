<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div x-data="{ open: false }" class="flex h-screen">

    {{-- Overlay mobile --}}
    <div 
        x-show="open" 
        @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden">
    </div>

    {{-- Sidebar --}}
    <div 
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed lg:static z-40 w-64 bg-purple-900 text-white min-h-screen p-4 transform lg:translate-x-0 transition duration-200">

        @include('admin.layout.sidebar')

    </div>

    {{-- Content --}}
    <div class="flex-1 flex flex-col min-w-0">

        {{-- Navbar --}}
        <div class="bg-white shadow p-4 flex items-center justify-between">

            <button @click="open = !open" class="lg:hidden text-purple-700 text-xl">
                ☰
            </button>

            <h1 class="font-bold text-purple-700">
                Admin ISTEK ICSADA
            </h1>

        </div>

        {{-- Main Content --}}
        <div class="p-6 overflow-auto min-w-0">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>