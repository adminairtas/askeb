@extends('admin.layout.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-xl font-bold text-purple-700 mb-6">
        Tambah User
    </h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm mb-1">Nama</label>
            <input type="text" name="name"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500">
        </div>

        <div>
            <label class="block text-sm mb-1">Email</label>
            <input type="email" name="email"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500">
        </div>

        <div>
            <label class="block text-sm mb-1">Password</label>
            <input type="password" name="password"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500">
        </div>

        <div>
            <label class="block text-sm mb-1">Role</label>
            <select name="role"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500">
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
            </select>
        </div>

        <button class="w-full bg-purple-700 hover:bg-purple-800 text-white py-2 rounded-lg">
            Simpan
        </button>

    </form>

</div>

@endsection