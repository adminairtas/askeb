<x-app-layout>

<div class="min-h-screen bg-purple-50 p-6">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow">

        <h2 class="text-xl font-bold text-purple-700 mb-4">
            Detail ASKEB
        </h2>

        <p><strong>Mahasiswa:</strong> {{ $askeb->mahasiswa->name }}</p>
        <p><strong>Tanggal:</strong> {{ $askeb->created_at->format('d-m-Y') }}</p>
        <p><strong>Status:</strong> {{ strtoupper($askeb->status) }}</p>

        <hr class="my-4">

        <p><strong>Isi ASKEB:</strong></p>
        <div class="bg-gray-100 p-4 rounded">
            {{ $askeb->isi ?? 'Belum ada isi' }}
        </div>

        <hr class="my-6">

        {{-- Tombol ACC --}}
        @if($askeb->status != 'acc')
        <form action="{{ route('dosen.askeb.acc', $askeb->id) }}" method="POST">
            @csrf
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mb-4">
                ACC Sekarang
            </button>
        </form>
        @else
            <div class="bg-green-100 p-3 rounded mb-4">
                ASKEB sudah di ACC
            </div>
        @endif

@if($askeb->revisis->count())
<hr class="my-6">

<h3 class="font-semibold text-purple-700 mb-4">
    Riwayat Revisi
</h3>

@foreach($askeb->revisis()->latest()->get() as $revisi)
    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded mb-3">
        <p class="text-sm text-gray-600">
            {{ $revisi->created_at->format('d-m-Y H:i') }}
        </p>

        <p class="text-gray-800 mt-2">
            {{ $revisi->komentar }}
        </p>
    </div>
@endforeach
@endif
        {{-- Form Revisi --}}
        @if($askeb->status != 'acc')
        <h3 class="font-semibold text-red-600 mb-2">Kirim Revisi</h3>

        <form action="{{ route('dosen.askeb.revisi', $askeb->id) }}" method="POST">
            @csrf

            <textarea name="komentar"
                class="w-full border rounded p-3"
                rows="4"
                placeholder="Tulis komentar revisi..."></textarea>

            <button type="submit"
                class="mt-3 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                Kirim Revisi
            </button>
        </form>
        @endif

    </div>

</div>

</x-app-layout>