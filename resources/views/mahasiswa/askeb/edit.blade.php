<x-app-layout>
<div class="p-6 max-w-7xl mx-auto">

<form action="{{ route('askeb.update', $askeb->id) }}" method="POST">
@csrf
@method('PUT')

<h2 class="text-2xl font-bold mb-6 text-purple-700">
    Edit Laporan ANC
</h2>

{{-- ================= HEADER ================= --}}
<div class="grid grid-cols-2 gap-6 mb-8">

    <div>
        <label class="font-semibold">Asuhan Kebidanan Pada</label>
        <textarea name="asuhan_pada" class="w-full border rounded p-2">{{ old('asuhan_pada', $askeb->asuhan_pada) }}</textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label>Tanggal Pengkajian</label>
            <input type="date" name="tanggal_pengkajian"
                value="{{ old('tanggal_pengkajian', $askeb->tanggal_pengkajian) }}"
                class="w-full border rounded p-2">
        </div>

        <div>
            <label>Pukul</label>
            <input type="time" name="pukul"
                value="{{ old('pukul', $askeb->pukul) }}"
                class="w-full border rounded p-2">
        </div>

        <div>
            <label>Tempat</label>
            <input type="text" name="tempat"
                value="{{ old('tempat', $askeb->tempat) }}"
                class="w-full border rounded p-2">
        </div>

        <div>
            <label>Oleh</label>
            <input type="text" name="oleh"
                value="{{ $askeb->oleh }}"
                readonly
                class="w-full border rounded p-2 bg-gray-100">
        </div>
    </div>
</div>

<hr class="my-6">

{{-- ================= BIODATA ================= --}}
<h3 class="text-lg font-bold text-purple-700 mb-4">
    A. Data Subyektif - Biodata
</h3>

<div class="grid grid-cols-2 gap-8 mb-6">

    <div class="space-y-3">
        <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $askeb->nama_ibu) }}" placeholder="Nama Ibu" class="input">
        <input type="text" name="umur_ibu" value="{{ old('umur_ibu', $askeb->umur_ibu) }}" placeholder="Umur" class="input">
        <input type="text" name="suku_ibu" value="{{ old('suku_ibu', $askeb->suku_ibu) }}" placeholder="Suku/Bangsa" class="input">
        <input type="text" name="agama_ibu" value="{{ old('agama_ibu', $askeb->agama_ibu) }}" placeholder="Agama" class="input">
        <input type="text" name="pendidikan_ibu" value="{{ old('pendidikan_ibu', $askeb->pendidikan_ibu) }}" placeholder="Pendidikan" class="input">
        <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $askeb->pekerjaan_ibu) }}" placeholder="Pekerjaan" class="input">
        <input type="text" name="penghasilan_ibu" value="{{ old('penghasilan_ibu', $askeb->penghasilan_ibu) }}" placeholder="Penghasilan" class="input">
    </div>

    <div class="space-y-3">
        <input type="text" name="nama_suami" value="{{ old('nama_suami', $askeb->nama_suami) }}" placeholder="Nama Suami" class="input">
        <input type="text" name="umur_suami" value="{{ old('umur_suami', $askeb->umur_suami) }}" placeholder="Umur" class="input">
        <input type="text" name="suku_suami" value="{{ old('suku_suami', $askeb->suku_suami) }}" placeholder="Suku/Bangsa" class="input">
        <input type="text" name="agama_suami" value="{{ old('agama_suami', $askeb->agama_suami) }}" placeholder="Agama" class="input">
        <input type="text" name="pendidikan_suami" value="{{ old('pendidikan_suami', $askeb->pendidikan_suami) }}" placeholder="Pendidikan" class="input">
        <input type="text" name="pekerjaan_suami" value="{{ old('pekerjaan_suami', $askeb->pekerjaan_suami) }}" placeholder="Pekerjaan" class="input">
        <input type="text" name="penghasilan_suami" value="{{ old('penghasilan_suami', $askeb->penghasilan_suami) }}" placeholder="Penghasilan" class="input">
    </div>
</div>

<textarea name="alamat" class="w-full border rounded p-2 mb-6">{{ old('alamat', $askeb->alamat) }}</textarea>

<textarea name="keluhan_utama" class="w-full border rounded p-2 mb-6">{{ old('keluhan_utama', $askeb->keluhan_utama) }}</textarea>

{{-- ================= RIWAYAT MENSTRUASI ================= --}}
<div class="grid grid-cols-2 gap-6 mb-6">
    <input type="text" name="menarche" value="{{ old('menarche', $askeb->menarche) }}" placeholder="Menarche" class="input">
    <input type="text" name="lama_haid" value="{{ old('lama_haid', $askeb->lama_haid) }}" placeholder="Lama haid" class="input">
    <input type="text" name="jumlah_haid" value="{{ old('jumlah_haid', $askeb->jumlah_haid) }}" placeholder="Jumlah haid" class="input">
    <input type="text" name="karakteristik_haid" value="{{ old('karakteristik_haid', $askeb->karakteristik_haid) }}" placeholder="Karakteristik" class="input">

    <div class="col-span-2">
        <select name="siklus_haid" class="w-full border rounded p-2">
            <option value="Teratur" {{ old('siklus_haid', $askeb->siklus_haid) == 'Teratur' ? 'selected' : '' }}>Teratur</option>
            <option value="Tidak Teratur" {{ old('siklus_haid', $askeb->siklus_haid) == 'Tidak Teratur' ? 'selected' : '' }}>Tidak Teratur</option>
        </select>
    </div>
</div>

{{-- ================= RIWAYAT OBSTETRI ================= --}}
<div class="overflow-x-auto mb-6">
<table class="w-full border border-collapse text-[11px]">
<thead class="bg-gray-100 text-center">
<tr>
<th>No</th>
<th>Kehamilan</th>
<th>Jenis</th>
<th>Penolong</th>
<th>Tempat</th>
<th>JK</th>
<th>BB/PB</th>
<th>Umur</th>
<th>Ket</th>
<th>Laktasi</th>
<th>Penyulit</th>
</tr>
</thead>
<tbody id="obstetriBody">

@forelse($askeb->obstetris as $index => $ob)
<tr>
<td class="border p-2 text-center">{{ $index+1 }}</td>
<td class="border p-2"><input type="text" name="kehamilan[]" value="{{ $ob->kehamilan }}" class="input"></td>
<td class="border p-2"><input type="text" name="jenis_persalinan[]" value="{{ $ob->jenis_persalinan }}" class="input"></td>
<td class="border p-2"><input type="text" name="penolong[]" value="{{ $ob->penolong }}" class="input"></td>
<td class="border p-2"><input type="text" name="tempat_persalinan[]" value="{{ $ob->tempat_persalinan }}" class="input"></td>
<td class="border p-2"><input type="text" name="jk_bayi[]" value="{{ $ob->jk_bayi }}" class="input"></td>
<td class="border p-2"><input type="text" name="bb_pb[]" value="{{ $ob->bb_pb }}" class="input"></td>
<td class="border p-2"><input type="text" name="umur_bayi[]" value="{{ $ob->umur_bayi }}" class="input"></td>
<td class="border p-2"><input type="text" name="keterangan_bayi[]" value="{{ $ob->keterangan_bayi }}" class="input"></td>
<td class="border p-2"><input type="text" name="laktasi[]" value="{{ $ob->laktasi }}" class="input"></td>
<td class="border p-2"><input type="text" name="penyulit_nifas[]" value="{{ $ob->penyulit_nifas }}" class="input"></td>
</tr>
@empty
<tr>
<td colspan="11" class="text-center p-4">Belum ada data obstetri</td>
</tr>
@endforelse

</tbody>
</table>
</div>

<button class="bg-purple-600 text-white px-6 py-2 rounded">
Update Laporan
</button>

</form>
</div>
</x-app-layout>