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
           <select name="dosen_id"
        required
        class="w-full border rounded-lg px-3 py-2 mt-1 bg-white text-black">

    <option value="" class="text-black">
        -- Pilih Dosen --
    </option>

    @foreach($dosens as $dosen)
        <option value="{{ $dosen->id }}" class="text-black">
            {{ $dosen->name }}
        </option>
    @endforeach

</select>
        </div>

        <div class="mt-4">
            <label class="block font-semibold">Isi ASKEB</label>
<br>

<form action="{{ route('askeb.store') }}" method="POST">
    @csrf

    @include('mahasiswa.askeb._form')
</form>

</x-app-layout>