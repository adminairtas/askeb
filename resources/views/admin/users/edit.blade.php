@extends('admin.layout.app')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-xl font-bold text-purple-700 mb-6">
        Edit User
    </h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block text-sm mb-1">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500">
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm mb-1">Email</label>
            <input type="email" name="email" value="{{ $user->email }}"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500">
        </div>

        {{-- Password --}}
        <div>
            <label class="block text-sm mb-1">Password (opsional)</label>
            <input type="password" name="password"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500">
            <small class="text-gray-400">Kosongkan jika tidak ingin mengubah password</small>
        </div>

        {{-- Role --}}
        <div>
            <label class="block text-sm mb-1">Role</label>
            <select name="role"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-purple-500">

                <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>
                    Mahasiswa
                </option>

                <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }}>
                    Dosen
                </option>

                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

            </select>
        </div>

        {{-- Button --}}
        <div class="flex gap-2">

            <button class="flex-1 bg-purple-700 hover:bg-purple-800 text-white py-2 rounded-lg">
                Update
            </button>

            <a href="{{ route('admin.users.index') }}"
               class="flex-1 text-center bg-gray-300 hover:bg-gray-400 py-2 rounded-lg">
               Batal
            </a>

        </div>

    </form>

</div>

@endsection