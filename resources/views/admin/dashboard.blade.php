@extends('admin.layout.app')

@section('content')

<h1 class="text-2xl font-bold mb-6 text-purple-700">Dashboard Admin</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-500">Total Mahasiswa</p>
        <p class="text-3xl font-bold text-purple-700">
            {{ $totalMahasiswa }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-500">Total Dosen</p>
        <p class="text-3xl font-bold text-purple-700">
            {{ $totalDosen }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-gray-500">Total Askeb</p>
        <p class="text-3xl font-bold text-purple-700">
            {{ $totalAskeb }}
        </p>
    </div>

</div>

<h2 class="text-xl font-bold mt-10 mb-4 text-purple-700">
    Statistik Status Askeb
</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

    <div class="bg-yellow-100 p-6 rounded-xl shadow text-center">
        <p class="text-yellow-700">Review</p>
        <p class="text-3xl font-bold">
            {{ $review }}
        </p>
    </div>

    <div class="bg-red-100 p-6 rounded-xl shadow text-center">
        <p class="text-red-700">Revisi</p>
        <p class="text-3xl font-bold">
            {{ $revisi }}
        </p>
    </div>

    <div class="bg-green-100 p-6 rounded-xl shadow text-center">
        <p class="text-green-700">ACC</p>
        <p class="text-3xl font-bold">
            {{ $acc }}
        </p>
    </div>

</div>

@endsection