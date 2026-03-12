@extends('admin.layout.app')

@section('content')

<div class="max-w-7xl mx-auto p-4 md:p-6">

    {{-- HEADER --}}
    <div class="bg-purple-700 text-white p-6 rounded-xl shadow-md mb-6">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                <h1 class="text-xl md:text-2xl font-bold">
                    Manajemen User
                </h1>
                <p class="text-purple-100 text-sm">
                    Kelola akun mahasiswa dan dosen
                </p>
            </div>

            <a href="{{ route('admin.users.create') }}"
               class="bg-white text-purple-700 px-4 py-2 rounded-lg font-semibold hover:bg-purple-100 transition">
               + Tambah User
            </a>

        </div>

    </div>


    {{-- TABEL USER --}}
    <div class="bg-white rounded-xl shadow-md overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                {{-- HEADER --}}
                <thead class="bg-purple-50 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Nama</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Role</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody class="divide-y">

                    @foreach($users as $key => $user)

                    <tr class="hover:bg-gray-50">

                        <td class="px-6 py-4">
                            {{ $key + 1 }}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">

                            @if($user->role == 'mahasiswa')
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-medium">
                                    Mahasiswa
                                </span>
                            @elseif($user->role == 'dosen')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">
                                    Dosen
                                </span>
                            @else
                                <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs font-medium">
                                    Admin
                                </span>
                            @endif

                        </td>

                        <td class="px-6 py-4 text-center">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('admin.users.edit',$user->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1.5 rounded-md text-xs hover:bg-yellow-600">
                                   Edit
                                </a>

                                <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus user ini?')"
                                        class="bg-red-600 text-white px-3 py-1.5 rounded-md text-xs hover:bg-red-700">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection