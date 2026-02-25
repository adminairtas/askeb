<x-app-layout>

<div class="min-h-screen bg-purple-50 p-6">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow">

        <h2 class="text-xl font-bold text-purple-700 mb-4">
            Detail ASKEB Saya
        </h2>

        <p><strong>Tanggal:</strong> {{ $askeb->created_at->format('d-m-Y') }}</p>
        <p><strong>Status:</strong> {{ strtoupper($askeb->status) }}</p>

        <hr class="my-4">

        <p><strong>Isi ASKEB:</strong></p>
        <div class="bg-gray-100 p-4 rounded">
            {{ $askeb->isi }}
        </div>
@if($askeb->revisis->count())
<hr class="my-6">

<h3 class="font-semibold text-red-600 mb-4">
    Riwayat Revisi Dosen
</h3>

@foreach($askeb->revisis()->latest()->get() as $revisi)
    <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded mb-3">
        <p class="text-sm text-gray-600">
            {{ $revisi->created_at->format('d-m-Y H:i') }}
        </p>

        <p class="text-gray-800 mt-2">
            {{ $revisi->komentar }}
        </p>
    </div>
@endforeach
@endif
        @if($askeb->status == 'revisi')
        <div class="bg-red-100 p-4 rounded mt-4">
            <strong>Komentar Dosen:</strong><br>
            {{ $askeb->komentar }}
        </div>
        @endif

        @if($askeb->status == 'acc')
        <div class="bg-green-100 p-4 rounded mt-4">
            ASKEB sudah di ACC oleh dosen.
        </div>
        @endif

    </div>

</div>

</x-app-layout>