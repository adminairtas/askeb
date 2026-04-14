@extends('admin.layout.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <h1 class="text-xl font-bold text-purple-700 mb-4">
        Data Dosen
    </h1>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">

            <thead class="bg-purple-50">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Email</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @foreach($dosen as $dsn)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 font-medium">{{ $dsn->name }}</td>
                    <td class="p-3 text-gray-600">{{ $dsn->email }}</td>
                </tr>
                @endforeach

            </tbody>

        </table>
    </div>

</div>

@endsection