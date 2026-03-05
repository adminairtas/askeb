<x-app-layout>

    <div class="min-h-screen bg-purple-50 p-6">

        <div class="max-w-6xl mx-auto">

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-purple-700">
                    Daftar ASKEB Saya
                </h1>

                <a href="{{ route('askeb.create') }}"
                   class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
                    + Buat ASKEB
                </a>
            </div>

            <div class="bg-white rounded-xl shadow overflow-hidden">

                <table class="min-w-full text-sm text-left">
                    <thead class="bg-purple-100 text-purple-700">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nama Pasien</th>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($askebs as $askeb)
                        <tr class="border-b">
                            <td class="px-6 py-3">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3">{{ $askeb->nama_ibu}}</td>
                            <td class="px-6 py-3">{{ $askeb->created_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-3">
                                <span class="px-3 py-1 rounded-full text-white
                                    @if($askeb->status == 'review') bg-yellow-500
                                    @elseif($askeb->status == 'revisi') bg-red-500
                                    @elseif($askeb->status == 'acc') bg-green-600
                                    @else bg-gray-500
                                    @endif">
                                    {{ strtoupper($askeb->status) }}
                                </span>
                            </td>
                           <td class="px-6 py-3 space-y-1">

    {{-- Tombol Detail --}}
    <a href="{{ route('askeb.show', $askeb->id) }}"
       class="text-blue-600 hover:underline block">
        Detail
    </a>

</td>
                        
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500">
                                Belum ada data ASKEB
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>