<x-app-layout>

<div class="p-6 max-w-4xl mx-auto bg-white rounded-xl shadow">

{{-- ================= STATUS ASKEB ================= --}}
<div class="mb-6 p-4 rounded-lg border
    @if($askeb->status == 'review') bg-yellow-50 border-yellow-300
    @elseif($askeb->status == 'revisi') bg-red-50 border-red-300
    @elseif($askeb->status == 'acc') bg-green-50 border-green-300
    @else bg-gray-50 border-gray-300
    @endif">

    <div class="flex justify-between items-center">
        
        <div>
            <p class="text-sm font-semibold">Status ASKEB :</p>

            <span class="px-3 py-1 rounded-full text-white text-xs font-semibold
                @if($askeb->status == 'review') bg-yellow-500
                @elseif($askeb->status == 'revisi') bg-red-500
                @elseif($askeb->status == 'acc') bg-green-600
                @else bg-gray-400
                @endif">
                {{ strtoupper($askeb->status) }}
            </span>
        </div>

        {{-- Indikator Sudah Revisi atau Belum --}}
        <div class="text-sm">
            @if($askeb->status == 'revisi')
                <span class="text-red-600 font-semibold">
                    ❌ Perlu Perbaikan
                </span>
            @elseif($askeb->status == 'review')
                <span class="text-yellow-600 font-semibold">
                    ⏳ Menunggu Review
                </span>
            @elseif($askeb->status == 'acc')
                <span class="text-green-600 font-semibold">
                    ✅ Sudah Disetujui
                </span>
            @endif

            {{-- Tombol Edit Jika Status Revisi --}}
@if($askeb->status == 'revisi')
    <div class="mt-4">
        <a href="{{ route('askeb.edit', $askeb->id) }}"
           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow">
            ✏ Edit ASKEB
        </a>
    </div>
@endif

        </div>

    </div>


{{-- ================= RIWAYAT REVISI ================= --}}
@if($askeb->status == 'revisi' && $askeb->revisis->isNotEmpty())

<div class="mt-4 bg-red-50 border border-red-300 rounded-lg p-4">
    <h3 class="font-semibold text-red-600 mb-3">
        Catatan Revisi Dosen
    </h3>

    @foreach($askeb->revisis->sortByDesc('created_at') as $revisi)
        <div class="mb-3 pb-3 border-b last:border-b-0">
            <p class="text-xs text-gray-500">
                {{ $revisi->created_at->format('d-m-Y H:i') }}
            </p>

            <p class="text-sm text-gray-800 mt-1">
                {{ $revisi->komentar }}
            </p>
        </div>
    @endforeach
</div>

@endif

{{-- ================= DOWNLOAD PDF ================= --}}
@if($askeb->status == 'acc')

<div class="mt-6">
    <a href="{{ route('mahasiswa.askeb.pdf', $askeb->id) }}"
       class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
        📄 Download PDF
    </a>
</div>

@endif

</div>

    {{-- HEADER --}}
    <div class="bg-purple-700 text-white p-6 rounded-xl mb-6">
        <h1 class="text-2xl font-bold">ASKEB KEHAMILAN</h1>
        <p>PRODI KEBIDANAN</p>
    </div>

    {{-- INFORMASI DOSEN --}}
    <div class="mb-6">
        <p><strong>Dosen Pembimbing:</strong> {{ $askeb->dosen->name ?? '-' }}</p>
        <p><strong>Mahasiswa:</strong> {{ $askeb->mahasiswa->name ?? '-' }}</p>
    </div>

    <hr class="my-6">

    {{-- HEADER DATA --}}
    <div class="grid grid-cols-2 gap-6 mb-6">
        <div>
            <strong>Asuhan Kebidanan Pada:</strong>
            <p>{{ $askeb->asuhan_pada ?? '-' }}</p>
        </div>
        <div>
            <p><strong>Tanggal:</strong> {{ $askeb->tanggal_pengkajian ?? '-'}}</p>
            <p><strong>Pukul:</strong> {{ $askeb->pukul ?? '-' }}</p>
            <p><strong>Tempat:</strong> {{ $askeb->tempat ?? '-' }}</p>
        </div>
    </div>

    <hr class="my-6">

    {{-- BIODATA --}}
    <h3 class="text-lg font-bold text-purple-700 mb-4">
        A. Data Subyektif
    </h3>

    <h3 class="font-semibold text-lg mb-3">1. Biodata/Identitas</h3>

    <div class="grid grid-cols-2 gap-8 mb-6">
        <div>
            <h4 class="font-semibold mb-2">Biodata Ibu</h4>
            <p>Nama: {{ $askeb->nama_ibu ?? '-' }}</p>
            <p>Umur: {{ $askeb->umur_ibu ?? '-' }}</p>
            <p>Suku: {{ $askeb->suku_ibu ?? '-' }}</p>
            <p>Agama: {{ $askeb->agama_ibu ?? '-' }}</p>
            <p>Pendidikan: {{ $askeb->pendidikan_ibu ?? '-' }}</p>
            <p>Pekerjaan: {{ $askeb->pekerjaan_ibu ?? '-' }}</p>
            <p>Penghasilan: {{ $askeb->penghasilan_ibu }}</p>
        </div>

        <div>
            <h4 class="font-semibold mb-2">Biodata Suami</h4>
            <p>Nama: {{ $askeb->nama_suami ?? '-' }}</p>
            <p>Umur: {{ $askeb->umur_suami ?? '-' }}</p>
            <p>Suku: {{ $askeb->suku_suami ?? '-' }}</p>
            <p>Agama: {{ $askeb->agama_suami ?? '-' }}</p>
            <p>Pendidikan: {{ $askeb->pendidikan_suami ?? '-' }}</p>
            <p>Pekerjaan: {{ $askeb->pekerjaan_suami ?? '-' }}</p>
            <p>Penghasilan: {{ $askeb->penghasilan_suami ?? '-' }}</p>
        </div>
    </div>

    <div class="mb-6">
        <strong>Alamat:</strong>
        <p>{{ $askeb->alamat ?? '-' }}</p>
    </div>

    <div class="mb-6">
        <strong>Keluhan Utama:</strong>
        <p>{{ $askeb->keluhan_utama ?? '-' }}</p>
    </div>

    <hr class="my-6">

    <div class="my-6">

    {{-- ================= RIWAYAT MENSTRUASI ================= --}}
    <h3 class="font-semibold text-lg mb-3">3. Riwayat Menstruasi</h3>

    <div class="grid grid-cols-2 gap-4 mb-6 text-sm">

        <div>
            <span class="font-medium">Menarche :</span>
            {{ $askeb->menarche ?? '-' }} th
        </div>

        <div>
            <span class="font-medium">Lama Haid :</span>
            {{ $askeb->lama_haid ?? '-' }} hari
        </div>

        <div>
            <span class="font-medium">Jumlah Haid :</span>
            {{ $askeb->jumlah_haid ?? '-' }} cc
        </div>

        <div>
            <span class="font-medium">Karakteristik :</span>
            {{ $askeb->karakteristik_haid ?? '-' }}
        </div>

        <div class="col-span-2">
            <span class="font-medium">Siklus Haid :</span>
            {{ $askeb->siklus_haid ?? '-' }}
        </div>
    </div>

    <hr class="my-6">

        {{-- ================= RIWAYAT PERKAWINAN ================= --}}
    <h3 class="font-semibold text-lg mb-3">4. Riwayat Perkawinan</h3>

    <div class="grid grid-cols-3 gap-4 text-sm">

        <div>
            <span class="font-medium">Usia Pertama Menikah :</span>
            {{ $askeb->usia_pertama_menikah ?? '-' }} th
        </div>

        <div>
            <span class="font-medium">Lama Menikah :</span>
            {{ $askeb->lama_menikah ?? '-' }} th
        </div>

        <div>
            <span class="font-medium">Status Pernikahan :</span>
            {{ $askeb->status_pernikahan ?? '-' }}
        </div>
    </div>

<hr class="my-6">

    {{-- RIWAYAT OBSTETRI --}}
    <h3 class="font-semibold text-lg mb-3">
        5. Riwayat Obstetri
    </h3>

    <div class="overflow-x-auto mb-6">
        <table class="w-full border border-collapse text-xs">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">No</th>
                    <th class="border p-2">Kehamilan</th>
                    <th class="border p-2">Jenis</th>
                    <th class="border p-2">Penolong</th>
                    <th class="border p-2">Tempat</th>
                    <th class="border p-2">JK</th>
                    <th class="border p-2">BB/PB</th>
                    <th class="border p-2">Umur</th>
                    <th class="border p-2">Ket</th>
                    <th class="border p-2">Laktasi</th>
                    <th class="border p-2">Penyulit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($askeb->obstetris as $i => $ob)
                <tr>
                    <td class="border p-2 text-center">{{ $i+1 }}</td>
                    <td class="border p-2">{{ $ob->kehamilan ?? '-' }}</td>
                    <td class="border p-2">{{ $ob->jenis_persalinan ?? '-' }}</td>
                    <td class="border p-2">{{ $ob->penolong ?? '-' }}</td>
                    <td class="border p-2">{{ $ob->tempat_persalinan ?? '-' }}</td>
                    <td class="border p-2">{{ $ob->jk_bayi ?? '-' }}</td>
                    <td class="border p-2">{{ $ob->bb_pb ?? '-' }}</td>
                    <td class="border p-2">{{ $ob->umur_bayi ?? '-' }}</td>
                    <td class="border p-2">{{ $ob->keterangan_bayi ?? '-' }}</td>
                    <td class="border p-2">{{ $ob->laktasi ?? '-' }}</td>
                    <td class="border p-2">{{ $ob->penyulit_nifas ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr class="my-6">
    {{-- ================= RIWAYAT KONTRASEPSI ================= --}}
    <h3 class="font-semibold text-lg mb-3">
        6. Riwayat Kontrasepsi
    </h3>

    <div class="mb-6 text-sm">
        <p class="font-medium">Sebelum Hamil Ibu :</p>
        <p>{{ $askeb->sebelum_hamil_ibu ?? '-' }}</p>
    </div>

    <hr class="my-6">

        {{-- ================= RIWAYAT KEHAMILAN ================= --}}
    <h3 class="font-semibold text-lg mb-3">
        7. Riwayat Kehamilan Sekarang
    </h3>

    <div class="grid grid-cols-3 gap-6 mb-6 text-sm">

        <div>
            <span class="font-medium">HPHT :</span>
            <p>
                {{ $askeb->hpht 
                    ? \Carbon\Carbon::parse($askeb->hpht)->translatedFormat('d F Y') 
                    : '-' }}
            </p>
        </div>

        <div>
            <span class="font-medium">HPL :</span>
            <p>
                {{ $askeb->hpl 
                    ? \Carbon\Carbon::parse($askeb->hpl)->translatedFormat('d F Y') 
                    : '-' }}
            </p>
        </div>

        <div>
            <span class="font-medium">Jumlah Periksa :</span>
            <p>{{ $askeb->jumlah_periksa ?? '-' }} kali</p>
        </div>

    </div>

    <div class="mb-6 text-sm">
        <span class="font-medium">Keluhan Selama Hamil :</span>
        <p>{{ $askeb->keluhan_hamil ?? '-' }}</p>
    </div>

    <hr class="my-6">

        <h3 class="font-semibold text-lg mb-3">
        8. Riwayat Kesehatan Ibu
    </h3>

    <div class="mb-6 text-sm">
        {{ $askeb->riwayat_kesehatan_ibu ?? '-' }}
    </div>

    <hr class="my-6">

    <h3 class="font-semibold text-lg mb-3">
    9. Riwayat Kesehatan Keluarga
    </h3>

    <div class="mb-6 text-sm">
        {{ $askeb->riwayat_kesehatan_keluarga ?? '-' }}
    </div>

    <hr class="my-6">

    <h3 class="font-semibold text-lg mb-3">
        10. Pola Fungsional Kesehatan
    </h3>

    <div class="mb-6 text-sm">
        {{ $askeb->pola_fungsional_kesehatan ?? '-' }}
    </div>

    <hr class="my-6">

    <h3 class="font-semibold text-lg mb-3">
        11. Riwayat Sosial Budaya, Pengetahuan dan Spiritual
    </h3>

<div class="grid grid-cols-2 gap-6 mb-6 text-sm">

    <div>
        <span class="font-medium">Kehamilan Ini :</span>
        <p>{{ $askeb->kehamilan_ini ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Kondisi Ibu :</span>
        <p>
            @if($askeb->kondisi_ibu_kehamilan == 'Senang')
                Senang dengan Kehamilannya
            @elseif($askeb->kondisi_ibu_kehamilan == 'Tidak_senang')
                Tidak Senang dengan Kehamilannya
            @else
                -
            @endif
        </p>
    </div>

    <div>
        <span class="font-medium">Tradisi :</span>
        <p>{{ $askeb->Tradisi ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Spiritual :</span>
        <p>{{ $askeb->Spiritual ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Pengetahuan :</span>
        <p>{{ $askeb->Pengetahuan ?? '-' }}</p>
    </div>

</div>

<hr class="my-6">

    {{-- ================= DATA OBYEKTIF ================= --}}
<h3 class="text-lg font-bold text-purple-700 mb-4">
    B. Data Obyektif
</h3>

{{-- ================= PEMERIKSAAN UMUM ================= --}}
<h4 class="font-semibold mb-3">1. Pemeriksaan Umum</h4>

<div class="grid grid-cols-2 gap-4 mb-6 text-sm">

    <div>
        <span class="font-medium">Kesadaran :</span>
        <p>{{ $askeb->kesadaran ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Tekanan Darah :</span>
        <p>{{ $askeb->tekanan_darah ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Denyut Nadi :</span>
        <p>{{ $askeb->denyut_nadi ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Pernafasan :</span>
        <p>{{ $askeb->pernafasan ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Suhu :</span>
        <p>{{ $askeb->suhu ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">LILA :</span>
        <p>{{ $askeb->lila ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Berat/Tinggi Badan :</span>
        <p>{{ $askeb->berat_tinggi_badan ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Berat Sebelum Hamil :</span>
        <p>{{ $askeb->berat_sebelum_hamil ?? '-' }}</p>
    </div>

</div>

<hr class="my-6">

<h4 class="font-semibold mb-3">2. Pemeriksaan Fisik</h4>

<div class="space-y-4 text-sm">

    <div><span class="font-medium">A. Kepala :</span> {{ $askeb->kepala ?? '-' }}</div>
    <div><span class="font-medium">B. Muka :</span> {{ $askeb->muka ?? '-' }}</div>
    <div><span class="font-medium">C. Mata :</span> {{ $askeb->mata ?? '-' }}</div>
    <div><span class="font-medium">D. Hidung :</span> {{ $askeb->hidung ?? '-' }}</div>
    <div><span class="font-medium">E. Mulut :</span> {{ $askeb->mulut ?? '-' }}</div>
    <div><span class="font-medium">F. Leher :</span> {{ $askeb->leher ?? '-' }}</div>
    <div><span class="font-medium">G. Dada :</span> {{ $askeb->dada ?? '-' }}</div>

    <div>
        <span class="font-medium">H. Abdomen :</span>
        <p>{{ $askeb->abdomen ?? '-' }}</p>
    </div>

</div>

<div class="grid grid-cols-3 gap-4 mt-4 mb-6 text-sm">

    <div><span class="font-medium">Leopold I :</span> {{ $askeb->leopold_i ?? '-' }}</div>
    <div><span class="font-medium">Leopold II :</span> {{ $askeb->leopold_ii ?? '-' }}</div>
    <div><span class="font-medium">Leopold III :</span> {{ $askeb->leopold_iii ?? '-' }}</div>
    <div><span class="font-medium">Leopold IV :</span> {{ $askeb->leopold_iv ?? '-' }}</div>
    <div><span class="font-medium">TBJ :</span> {{ $askeb->tbj ?? '-' }}</div>
    <div><span class="font-medium">DJJ :</span> {{ $askeb->djj ?? '-' }}</div>

</div>

<div class="space-y-4 text-sm">

    <div><span class="font-medium">I. Genetalia :</span> {{ $askeb->genetalia ?? '-' }}</div>
    <div><span class="font-medium">J. Anus :</span> {{ $askeb->anus ?? '-' }}</div>
    <div><span class="font-medium">K. Ekstremitas :</span> {{ $askeb->ekstemitas ?? '-' }}</div>

</div>

<hr class="my-6">

<h4 class="font-semibold mb-3">3. Pemeriksaan Panggul Luar</h4>

<div class="grid grid-cols-2 gap-4 mb-6 text-sm">

    <div>
        <span class="font-medium">Distansia Spinarum :</span>
        <p>{{ $askeb->distansia_sinarum ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Distansia Kristarum :</span>
        <p>{{ $askeb->distansia_kristarum ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Konjugata Eksterna :</span>
        <p>{{ $askeb->konjugata_eksterna ?? '-' }}</p>
    </div>

    <div>
        <span class="font-medium">Lingkar Panggul :</span>
        <p>{{ $askeb->lingkar_panggul ?? '-' }}</p>
    </div>

</div>

<hr class="my-6">



    {{-- DIAGNOSIS --}}
    <h3 class="text-lg font-bold text-purple-700 mb-4">
        C. Analisis Data
    </h3>

    <p><strong>Diagnosis:</strong></p>
    <p class="mb-4">{{ $askeb->diagnosis ?? '-' }}</p>

    <p><strong>Masalah Potensial:</strong></p>
    <p class="mb-4">{{ $askeb->masalah_potensial ?? '-' }}</p>

    <p><strong>Kebutuhan Segera:</strong></p>
    <p class="mb-6">{{ $askeb->kebutuhan_segera ?? '-' }}</p>

    {{-- PENATALAKSANAAN --}}
    <h3 class="text-lg font-bold text-purple-700 mb-4">
        D. Penatalaksanaan
    </h3>

    <p><strong>Jam:</strong> {{ $askeb->jam_penatalaksanaan ?? '-' }}</p>
    <p>1. {{ $askeb->penatalaksanaan1 ?? '-' }}</p>
    <p>2. {{ $askeb->penatalaksanaan2 ?? '-' }}</p>
    <p>3. {{ $askeb->penatalaksanaandst ?? '-' }}</p>

</div>

</x-app-layout>