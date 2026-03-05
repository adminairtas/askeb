<x-app-layout>

<div class="min-h-screen bg-purple-50 p-6">

    <div class="max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="bg-purple-800 text-white p-6 rounded-xl shadow-lg">
            <h1 class="text-2xl font-bold">
                DASHBOARD DOSEN
            </h1>
            <p class="text-sm">
                E-ASKEB KEHAMILAN - PRODI KEBIDANAN
            </p>
            <p class="mt-2">
                Selamat datang, {{ auth()->user()->name }}
            </p>
        </div>

        <!-- STATISTIK -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">

            <div class="bg-white p-4 rounded-xl shadow text-center">
                <p class="text-gray-500 text-sm">Total ASKEB</p>
                <p class="text-2xl font-bold text-purple-700">{{ $total }}</p>
            </div>

            <div class="bg-yellow-100 p-4 rounded-xl shadow text-center">
                <p class="text-yellow-700 text-sm">Review</p>
                <p class="text-2xl font-bold text-yellow-600">{{ $review }}</p>
            </div>

            <div class="bg-red-100 p-4 rounded-xl shadow text-center">
                <p class="text-red-700 text-sm">Revisi</p>
                <p class="text-2xl font-bold text-red-600">{{ $revisi }}</p>
            </div>

            <div class="bg-green-100 p-4 rounded-xl shadow text-center">
                <p class="text-green-700 text-sm">ACC</p>
                <p class="text-2xl font-bold text-green-600">{{ $acc }}</p>
            </div>

        </div>

        <!-- TABEL ASKEB -->
        <div class="bg-white rounded-xl shadow mt-6 overflow-hidden">

            <div class="p-4 bg-purple-100 font-semibold text-purple-700">
                Daftar ASKEB Masuk
            </div>

            <table class="min-w-full text-sm text-left">
                <thead class="bg-purple-50 text-purple-700">
                    <tr>
                        <th class="px-6 py-3">Mahasiswa</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($askebs as $askeb)
                    <tr class="border-b">
                        <td class="px-6 py-3">
                            {{ $askeb->mahasiswa->name }}
                        </td>

                        <td class="px-6 py-3">
                            {{ $askeb->created_at->format('d-m-Y') }}
                        </td>

                        <td class="px-6 py-3">
                            <span class="px-3 py-1 rounded-full text-white
                                @if($askeb->status == 'review') bg-yellow-500
                                @elseif($askeb->status == 'revisi') bg-red-500
                                @elseif($askeb->status == 'acc') bg-green-600
                                @endif">
                                {{ strtoupper($askeb->status) }}
                            </span>
                        </td>

                        <td class="px-6 py-3">
 <a href="{{ route('dosen.askeb.show', $askeb->id) }}"
   class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded">
    Review
</a>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">
                            Belum ada ASKEB masuk
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

</div>

</x-app-layout>