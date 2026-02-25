<x-app-layout>

<div class="p-6 max-w-4xl mx-auto">

    <div class="bg-purple-700 text-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold">
            ASKEB KEHAMILAN
        </h1>
        <p>PRODI KEBIDANAN</p>
    </div>

    <form action="{{ route('askeb.store') }}" method="POST" class="mt-6 bg-white p-6 rounded-xl shadow">
        @csrf

        <div>
            <label class="block font-semibold">Pilih Dosen Pembimbing</label>
            <select name="dosen_id" class="w-full mt-2 border rounded p-2" required>
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <label class="block font-semibold">Isi ASKEB</label>
            <textarea name="isi" rows="6" class="w-full mt-2 border rounded p-2" required></textarea>
        </div>

        <button class="mt-4 bg-purple-600 text-white px-4 py-2 rounded">
            Kirim ke Dosen
        </button>
    </form>

</div>

</x-app-layout>