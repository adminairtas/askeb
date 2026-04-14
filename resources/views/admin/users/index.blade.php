@extends('admin.layout.app')

@section('content')

<div class="max-w-7xl mx-auto p-4 md:p-6">

    {{-- HEADER --}}
    <div class="bg-purple-700 text-white p-6 rounded-xl shadow mb-6">

        <div class="flex flex-col md:flex-row md:justify-between gap-4">

            <div>
                <h1 class="text-xl md:text-2xl font-bold">
                    Manajemen User
                </h1>
                <p class="text-purple-100 text-sm">
                    Kelola akun mahasiswa, dosen, dan admin
                </p>
            </div>

            <a href="{{ route('admin.users.create') }}"
                class="bg-white text-purple-700 px-4 py-2 rounded-lg font-semibold">
                + Tambah User
            </a>

        </div>

    </div>

    {{-- FILTER TAB --}}
    <div class="flex gap-2 mb-4 flex-wrap">

        <a href="{{ route('admin.users.index') }}"
            class="px-4 py-2 rounded-lg text-sm 
            {{ !$role ? 'bg-purple-700 text-white' : 'bg-gray-200' }}">
            Semua
        </a>

        <a href="{{ route('admin.users.index',['role'=>'mahasiswa']) }}"
            class="px-4 py-2 rounded-lg text-sm 
            {{ $role == 'mahasiswa' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
            Mahasiswa
        </a>

        <a href="{{ route('admin.users.index',['role'=>'dosen']) }}"
            class="px-4 py-2 rounded-lg text-sm 
            {{ $role == 'dosen' ? 'bg-green-600 text-white' : 'bg-gray-200' }}">
            Dosen
        </a>

        <a href="{{ route('admin.users.index',['role'=>'admin']) }}"
            class="px-4 py-2 rounded-lg text-sm 
            {{ $role == 'admin' ? 'bg-gray-700 text-white' : 'bg-gray-200' }}">
            Admin
        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">

<div class="overflow-x-auto">
    <table class="min-w-[900px] text-sm">

                <thead class="bg-purple-50">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Nama</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Role</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse($users as $key => $user)

                    <tr class="hover:bg-gray-50">

                        <td class="px-6 py-4">
                            {{ $key + 1 }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">

                            @if($user->role == 'mahasiswa')
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">
                                    Mahasiswa
                                </span>
                            @elseif($user->role == 'dosen')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                    Dosen
                                </span>
                            @else
                                <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs">
                                    Admin
                                </span>
                            @endif

                        </td>

                        <td class="px-6 py-4 text-center">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('admin.users.edit',$user->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                                    Edit
                                </a>

                                <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Yakin hapus?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded text-xs">
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4 text-gray-500">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection