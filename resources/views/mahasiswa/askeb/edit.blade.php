<x-app-layout>

<div class="p-6">
<div class="max-w-4xl mx-auto">

<form action="{{ route('askeb.update',$askeb->id) }}" method="POST">
@csrf
@method('PUT')

<div class="bg-gray-50 p-6 rounded-xl shadow">
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
<label class="font-semibold">1. Biodata Identitas</label>
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

<label class="font-semibold">2. Keluhatan Utama</label>
<textarea name="keluhan_utama" class="w-full border rounded p-2 mb-6">{{ old('keluhan_utama', $askeb->keluhan_utama) }}</textarea>

{{-- ================= RIWAYAT MENSTRUASI ================= --}}
<label class="font-semibold">3. Riwayat Menstruasi</label>
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

<label class="font-semibold">4. Riwayat Perkawinan</label>
<div class="grid grid-cols-3 gap-6 mb-6">

    <input 
        type="text" 
        name="usia_pertama_menikah" 
        value="{{ $askeb->usia_pertama_menikah }}"
        placeholder="Usia Pertama Menikah ...th" 
        class="input">

    <input 
        type="text" 
        name="lama_menikah" 
        value="{{ $askeb->lama_menikah }}"
        placeholder="Lama Menikah ...th" 
        class="input">

    <input 
        type="text" 
        name="status_pernikahan" 
        value="{{ $askeb->status_pernikahan }}"
        placeholder="Status Pernikahan" 
        class="input">

</div>

{{-- ================= RIWAYAT OBSTETRI ================= --}}
<label class="font-semibold">5. Riwayat Obstetri</label>
<div class="overflow-x-auto w-full mb-6">

<table class="min-w-[1100px] w-full border border-collapse text-[11px]">
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
<td class="border p-2 text-center nomor">{{ $index+1 }}</td>

<td class="border p-1"><input type="text" name="kehamilan[]" value="{{ $ob->kehamilan }}" class="input"></td>
<td class="border p-1"><input type="text" name="jenis_persalinan[]" value="{{ $ob->jenis_persalinan }}" class="input"></td>
<td class="border p-1"><input type="text" name="penolong[]" value="{{ $ob->penolong }}" class="input"></td>
<td class="border p-1"><input type="text" name="tempat_persalinan[]" value="{{ $ob->tempat_persalinan }}" class="input"></td>
<td class="border p-1"><input type="text" name="jk_bayi[]" value="{{ $ob->jk_bayi }}" class="input"></td>
<td class="border p-1"><input type="text" name="bb_pb[]" value="{{ $ob->bb_pb }}" class="input"></td>
<td class="border p-1"><input type="text" name="umur_bayi[]" value="{{ $ob->umur_bayi }}" class="input"></td>
<td class="border p-1"><input type="text" name="keterangan_bayi[]" value="{{ $ob->keterangan_bayi }}" class="input"></td>
<td class="border p-1"><input type="text" name="laktasi[]" value="{{ $ob->laktasi }}" class="input"></td>
<td class="border p-1"><input type="text" name="penyulit_nifas[]" value="{{ $ob->penyulit_nifas }}" class="input"></td>

</tr>
@empty
<tr>
<td class="border p-2 text-center nomor">1</td>

<td class="border p-1"><input type="text" name="kehamilan[]" class="input"></td>
<td class="border p-1"><input type="text" name="jenis_persalinan[]" class="input"></td>
<td class="border p-1"><input type="text" name="penolong[]" class="input"></td>
<td class="border p-1"><input type="text" name="tempat_persalinan[]" class="input"></td>
<td class="border p-1"><input type="text" name="jk_bayi[]" class="input"></td>
<td class="border p-1"><input type="text" name="bb_pb[]" class="input"></td>
<td class="border p-1"><input type="text" name="umur_bayi[]" class="input"></td>
<td class="border p-1"><input type="text" name="keterangan_bayi[]" class="input"></td>
<td class="border p-1"><input type="text" name="laktasi[]" class="input"></td>
<td class="border p-1"><input type="text" name="penyulit_nifas[]" class="input"></td>

</tr>
@endforelse

</tbody>
</table>
</div>
<div class="flex gap-2 mb-6">

<button type="button"
onclick="tambahBaris()"
class="bg-purple-600 text-white px-4 py-2 rounded">
+ Tambah
</button>

<button type="button"
onclick="hapusBaris()"
class="bg-red-500 text-white px-4 py-2 rounded">
- Hapus
</button>
</div>

<hr class="my-6">

{{-- ================= RIWAYAT KONTRASEPSI ================= --}}
<label class="font-semibold">6. Riwayat Kontrasepsi</label>
<h5>Sebelum Hamil Ibu :</h5>  

<div class="grid grid-cols-3 gap-6 mb-6">  
    <input type="text" name="sebelum_hamil_ibu"
        value="{{ old('sebelum_hamil_ibu', $askeb->sebelum_hamil_ibu) }}"
        class="input">
</div>

<hr class="my-6">

{{-- ================= RIWAYAT KEHAMILAN SEKARANG ================= --}}
<label class="font-semibold">7. Riwayat Kehamilan Sekarang</label>

<div class="grid grid-cols-3 gap-6 mb-6">

    <div>
        <label>HPHT</label>
        <input type="date" name="hpht"
            value="{{ old('hpht', $askeb->hpht) }}"
            class="input">
    </div>

    <div>
        <label>HPL</label>
        <input type="date" name="hpl"
            value="{{ old('hpl', $askeb->hpl) }}"
            class="input">
    </div>

    <div>
        <label>Jumlah Periksa</label>
        <input type="text" name="jumlah_periksa"
            value="{{ old('jumlah_periksa', $askeb->jumlah_periksa) }}"
            class="input">
    </div>

</div>

<div class="mb-6">
<textarea name="keluhan_hamil"
class="w-full border rounded p-2"
placeholder="Keluhan selama hamil">{{ old('keluhan_hamil', $askeb->keluhan_hamil) }}</textarea>
</div>

<hr class="my-6">

{{-- ================= RIWAYAT KESEHATAN IBU ================= --}}
<label class="font-semibold">8. Riwayat Kesehatan Ibu</label>

<div class="mb-6">
<textarea name="riwayat_kesehatan_ibu"
class="w-full border rounded p-2"
placeholder="Riwayat kesehatan ibu">{{ old('riwayat_kesehatan_ibu', $askeb->riwayat_kesehatan_ibu) }}</textarea>
</div>

<hr class="my-6">

{{-- ================= RIWAYAT KESEHATAN KELUARGA ================= --}}
<label class="font-semibold">9. Riwayat Kesehatan Keluarga</label>

<div class="mb-6">
<textarea name="riwayat_kesehatan_keluarga"
class="w-full border rounded p-2"
placeholder="Riwayat kesehatan keluarga">{{ old('riwayat_kesehatan_keluarga', $askeb->riwayat_kesehatan_keluarga) }}</textarea>
</div>

<hr class="my-6">

{{-- ================= POLA FUNGSIONAL KESEHATAN ================= --}}
<label class="font-semibold">10. Pola Fungsional Kesehatan</label>

<div class="mb-6">
<textarea name="pola_fungsional_kesehatan"
class="w-full border rounded p-2"
placeholder="Pola fungsional kesehatan">{{ old('pola_fungsional_kesehatan', $askeb->pola_fungsional_kesehatan) }}</textarea>
</div>

<hr class="my-6">

{{-- ================= SOSIAL BUDAYA ================= --}}
<label class="font-semibold">11. Riwayat Sosial Budaya, Pengetahuan dan Spiritual</label>

<div class="grid grid-cols-2 gap-8 mb-6">

<div class="space-y-3">

<input type="text"
name="kehamilan_ini"
value="{{ old('kehamilan_ini', $askeb->kehamilan_ini) }}"
placeholder="Kehamilan Ini"
class="input">

<div>
<label>Kondisi Ibu dengan Kehamilan</label>
<select name="kondisi_ibu_kehamilan" class="w-full border rounded p-2">

<option value="Senang"
{{ old('kondisi_ibu_kehamilan', $askeb->kondisi_ibu_kehamilan) == 'Senang' ? 'selected' : '' }}>
Senang dengan Kehamilan
</option>

<option value="Tidak_senang"
{{ old('kondisi_ibu_kehamilan', $askeb->kondisi_ibu_kehamilan) == 'Tidak_senang' ? 'selected' : '' }}>
Tidak Senang dengan Kehamilan
</option>

</select>
</div>

<input type="text"
name="Tradisi"
value="{{ old('Tradisi', $askeb->Tradisi) }}"
placeholder="Tradisi"
class="input">

<input type="text"
name="Spiritual"
value="{{ old('Spiritual', $askeb->Spiritual) }}"
placeholder="Spiritual"
class="input">

<input type="text"
name="Pengetahuan"
value="{{ old('Pengetahuan', $askeb->Pengetahuan) }}"
placeholder="Pengetahuan"
class="input">

</div>

</div>

<hr class="my-6">

{{-- ================= DATA OBYEKTIF ================= --}}
<h3 class="text-lg font-bold text-purple-700 mb-4">
    B. Data Obyektif
</h3>

<div class="grid grid-cols-2 gap-4 mb-4">

{{-- ================= PEMERIKSAAN UMUM ================= --}}
<div class="space-y-3">

<h4 class="font-semibold">1. Pemeriksaan Umum</h4>

<input type="text" name="kesadaran"
value="{{ old('kesadaran', $askeb->kesadaran) }}"
placeholder="Kesadaran" class="input">

<input type="text" name="tekanan_darah"
value="{{ old('tekanan_darah', $askeb->tekanan_darah) }}"
placeholder="Tekanan Darah" class="input">

<input type="text" name="denyut_nadi"
value="{{ old('denyut_nadi', $askeb->denyut_nadi) }}"
placeholder="Denyut Nadi" class="input">

<input type="text" name="pernafasan"
value="{{ old('pernafasan', $askeb->pernafasan) }}"
placeholder="Pernafasan" class="input">

</div>

<div class="space-y-3">

<br>

<input type="text" name="suhu"
value="{{ old('suhu', $askeb->suhu) }}"
placeholder="Suhu Tubuh" class="input">

<input type="text" name="lila"
value="{{ old('lila', $askeb->lila) }}"
placeholder="LILA" class="input">

<input type="text" name="berat_tinggi_badan"
value="{{ old('berat_tinggi_badan', $askeb->berat_tinggi_badan) }}"
placeholder="Berat / Tinggi Badan" class="input">

<input type="text" name="berat_sebelum_hamil"
value="{{ old('berat_sebelum_hamil', $askeb->berat_sebelum_hamil) }}"
placeholder="Berat Sebelum Hamil" class="input">

</div>

</div>

<hr class="my-6">

{{-- ================= PEMERIKSAAN FISIK ================= --}}
<div class="space-y-3">

<h4 class="font-semibold">2. Pemeriksaan Fisik</h4>

<h5>A. Kepala</h5>
<textarea name="kepala" class="w-full border rounded p-2 mb-4">
{{ old('kepala', $askeb->kepala) }}
</textarea>

<h5>B. Muka</h5>
<textarea name="muka" class="w-full border rounded p-2 mb-4">
{{ old('muka', $askeb->muka) }}
</textarea>

<h5>C. Mata</h5>
<textarea name="mata" class="w-full border rounded p-2 mb-4">
{{ old('mata', $askeb->mata) }}
</textarea>

<h5>D. Hidung</h5>
<textarea name="hidung" class="w-full border rounded p-2 mb-4">
{{ old('hidung', $askeb->hidung) }}
</textarea>

<h5>E. Mulut</h5>
<textarea name="mulut" class="w-full border rounded p-2 mb-4">
{{ old('mulut', $askeb->mulut) }}
</textarea>

<h5>F. Leher</h5>
<textarea name="leher" class="w-full border rounded p-2 mb-4">
{{ old('leher', $askeb->leher) }}
</textarea>

<h5>G. Dada</h5>
<textarea name="dada" class="w-full border rounded p-2 mb-4">
{{ old('dada', $askeb->dada) }}
</textarea>

<h5>H. Abdomen</h5>
<textarea name="abdomen" class="w-full border rounded p-2 mb-4">
{{ old('abdomen', $askeb->abdomen) }}
</textarea>

<input type="text" name="leopold_i"
value="{{ old('leopold_i', $askeb->leopold_i) }}"
placeholder="Leopold I" class="input">

<input type="text" name="leopold_ii"
value="{{ old('leopold_ii', $askeb->leopold_ii) }}"
placeholder="Leopold II" class="input">

<input type="text" name="leopold_iii"
value="{{ old('leopold_iii', $askeb->leopold_iii) }}"
placeholder="Leopold III" class="input">

<input type="text" name="leopold_iv"
value="{{ old('leopold_iv', $askeb->leopold_iv) }}"
placeholder="Leopold IV" class="input">

<input type="text" name="tbj"
value="{{ old('tbj', $askeb->tbj) }}"
placeholder="TBJ" class="input">

<input type="text" name="djj"
value="{{ old('djj', $askeb->djj) }}"
placeholder="DJJ" class="input">

<h5>I. Genetalia</h5>
<textarea name="genetalia" class="w-full border rounded p-2 mb-4">
{{ old('genetalia', $askeb->genetalia) }}
</textarea>

<h5>J. Anus</h5>
<textarea name="anus" class="w-full border rounded p-2 mb-4">
{{ old('anus', $askeb->anus) }}
</textarea>

<h5>K. Ekstemitas</h5>
<textarea name="ekstemitas" class="w-full border rounded p-2 mb-4">
{{ old('ekstemitas', $askeb->ekstemitas) }}
</textarea>

</div>

<hr class="my-6">

{{-- ================= PEMERIKSAAN PANGGUL LUAR ================= --}}
<div class="grid grid-cols-2 gap-4 mb-4">

<div class="space-y-3">

<h4 class="font-semibold">3. Pemeriksaan Panggul Luar</h4>

<input type="text" name="distansia_sinarum"
value="{{ old('distansia_sinarum', $askeb->distansia_sinarum) }}"
placeholder="Distansia Spinarum" class="input">

<input type="text" name="distansia_kristarum"
value="{{ old('distansia_kristarum', $askeb->distansia_kristarum) }}"
placeholder="Distansia Kristarum" class="input">

</div>

<div class="space-y-3">

<br>

<input type="text" name="konjugata_eksterna"
value="{{ old('konjugata_eksterna', $askeb->konjugata_eksterna) }}"
placeholder="Konjugata Eksterna" class="input">

<input type="text" name="lingkar_panggul"
value="{{ old('lingkar_panggul', $askeb->lingkar_panggul) }}"
placeholder="Lingkar Panggul" class="input">

</div>

</div>

<hr class="my-6">

{{-- ================= ANALISIS & PENATALAKSANAAN ================= --}}
<h3 class="text-lg font-bold text-purple-700 mb-4">
    C. Analisis Data
</h3>

<h4 class="font-semibold">1. Diagnosis</h4>
<textarea name="diagnosis" class="w-full border rounded p-2 mb-4"
placeholder="Diagnosis">{{ old('diagnosis', $askeb->diagnosis) }}</textarea>

<h4 class="font-semibold">2. Masalah Potensial</h4>
<textarea name="masalah_potensial" class="w-full border rounded p-2 mb-4"
placeholder="Masalah Potensial">{{ old('masalah_potensial', $askeb->masalah_potensial) }}</textarea>

<h4 class="font-semibold">3. Kebutuhan Segera</h4>
<textarea name="kebutuhan_segera" class="w-full border rounded p-2 mb-4"
placeholder="Kebutuhan Segera">{{ old('kebutuhan_segera', $askeb->kebutuhan_segera) }}</textarea>


<h3 class="text-lg font-bold text-purple-700 mb-4">
    D. Penatalaksanaan
</h3>

<h4 class="font-semibold">JAM :</h4>

<input type="time"
name="jam_penatalaksanaan"
value="{{ old('jam_penatalaksanaan', $askeb->jam_penatalaksanaan) }}"
class="input mb-4">

<div class="grid grid-cols-2 gap-8 mb-6">

<div class="space-y-3">

<input type="text"
name="penatalaksanaan1"
value="{{ old('penatalaksanaan1', $askeb->penatalaksanaan1) }}"
placeholder="Penatalaksana 1"
class="input">

<input type="text"
name="penatalaksanaan2"
value="{{ old('penatalaksanaan2', $askeb->penatalaksanaan2) }}"
placeholder="Penatalaksana 2"
class="input">

<input type="text"
name="penatalaksanaandst"
value="{{ old('penatalaksanaandst', $askeb->penatalaksanaandst) }}"
placeholder="Penatalaksana Dst"
class="input">

</div>

</div>
</div>

<button class="bg-purple-600 text-white px-6 py-2 rounded">
Update Laporan
</button>

</form>
</div>
</div>



<script>

function tambahBaris() {

let table = document.getElementById("obstetriBody");
let rowCount = table.rows.length;

let row = table.insertRow();

row.innerHTML = `
<td class="border p-2 text-center nomor">${rowCount + 1}</td>

<td class="border p-1"><input type="text" name="kehamilan[]" class="input"></td>
<td class="border p-1"><input type="text" name="jenis_persalinan[]" class="input"></td>
<td class="border p-1"><input type="text" name="penolong[]" class="input"></td>
<td class="border p-1"><input type="text" name="tempat_persalinan[]" class="input"></td>
<td class="border p-1"><input type="text" name="jk_bayi[]" class="input"></td>
<td class="border p-1"><input type="text" name="bb_pb[]" class="input"></td>
<td class="border p-1"><input type="text" name="umur_bayi[]" class="input"></td>
<td class="border p-1"><input type="text" name="keterangan_bayi[]" class="input"></td>
<td class="border p-1"><input type="text" name="laktasi[]" class="input"></td>
<td class="border p-1"><input type="text" name="penyulit_nifas[]" class="input"></td>
`;

}

function hapusBaris() {

let table = document.getElementById("obstetriBody");

if(table.rows.length > 1){
table.deleteRow(table.rows.length - 1);
}

}

</script>

</x-app-layout>