@extends('admin.layout.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <h1 class="text-xl font-bold text-purple-700 mb-4">
        Data ASKEB Mahasiswa
    </h1>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">

            <thead class="bg-purple-50">
                <tr>
                    <th class="p-3 text-left">Mahasiswa</th>
                    <th class="p-3 text-left">Nama Pasien</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Status</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @foreach($askeb as $a)
                <tr class="hover:bg-gray-50">

                    <td class="p-3 font-medium">
                        {{ optional($a->mahasiswa)->name ?? '-' }}
                    </td>

                    
                    <td class="p-3 font-medium">
                        {{ $a->nama_ibu ?? '-' }}
                    </td>

                    <td class="p-3 text-gray-600">
                        {{ $a->created_at->format('d-m-Y') }}
                    </td>

                    <td class="p-3">

                        @if($a->status == 'review')
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                                Review
                            </span>
                        @elseif($a->status == 'revisi')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                                Revisi
                            </span>
                        @else
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                ACC
                            </span>
                        @endif

                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>
    </div>

</div>

@endsection