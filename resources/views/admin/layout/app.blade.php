<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex">

    {{-- Sidebar --}}
    @include('admin.layout.sidebar')

    {{-- Content --}}
    <div class="flex-1 p-6">

        @yield('content')

    </div>

</div>


</body>
</html>