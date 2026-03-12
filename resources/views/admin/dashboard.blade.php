@extends('admin.layout.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4">

    <div class="bg-blue-100 p-6 rounded-xl shadow text-center">
        <p class="text-gray-600">Total Mahasiswa</p>
        <p class="text-3xl font-bold text-blue-700">
            {{ $totalMahasiswa }}
        </p>
    </div>

    <div class="bg-purple-100 p-6 rounded-xl shadow text-center">
        <p class="text-gray-600">Total Dosen</p>
        <p class="text-3xl font-bold text-purple-700">
            {{ $totalDosen }}
        </p>
    </div>

    <div class="bg-gray-100 p-6 rounded-xl shadow text-center">
        <p class="text-gray-600">Total Askeb</p>
        <p class="text-3xl font-bold text-gray-700">
            {{ $totalAskeb }}
        </p>
    </div>

</div>


<h2 class="text-xl font-bold mt-10 mb-4">Statistik Status Askeb</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div class="bg-yellow-100 p-6 rounded-xl shadow text-center">
        <p class="text-yellow-700">Review</p>
        <p class="text-3xl font-bold text-yellow-600">
            {{ $review }}
        </p>
    </div>

    <div class="bg-red-100 p-6 rounded-xl shadow text-center">
        <p class="text-red-700">Revisi</p>
        <p class="text-3xl font-bold text-red-600">
            {{ $revisi }}
        </p>
    </div>

    <div class="bg-green-100 p-6 rounded-xl shadow text-center">
        <p class="text-green-700">ACC</p>
        <p class="text-3xl font-bold text-green-600">
            {{ $acc }}
        </p>
    </div>

</div>

@endsection