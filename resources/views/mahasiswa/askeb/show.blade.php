<x-app-layout>

    <div class="p-6 max-w-4xl mx-auto bg-white rounded-xl shadow">


        {{-- HEADER --}}
        <div class="bg-purple-700 text-white p-6 rounded-xl mb-6">
            <h1 class="text-2xl font-bold">ASKEB KEHAMILAN</h1>
            <p>PRODI KEBIDANAN</p>
        </div>

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

@if($askeb->status == 'acc')

<div class="mt-6 flex gap-3">

<a href="{{ route('mahasiswa.askeb.pdf', $askeb->id) }}"
class="bg-green-600 text-white px-4 py-2 rounded-lg shadow">
📄 Download PDF
</a>

<a href="{{ route('askeb.print', $askeb->id) }}" 
   target="_blank"
   class="bg-green-600 text-white px-4 py-2 rounded">
🖨 Print PDF
</a>

</div>

@endif

        </div>

        <hr class="my-6">
        {{-- INFORMASI DOSEN --}}
        <div class="mb-6">
            <p><strong>Dosen Pembimbing:</strong> {{ $askeb->dosen->name ?? '-' }}</p>
            <p><strong>Mahasiswa:</strong> {{ $askeb->mahasiswa->name ?? '-' }}</p>
        </div>



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

        <hr class="my-6">

        {{-- KELUHAN UTAMA --}}
        <h3 class="font-semibold text-lg mb-3">2. Keluhan Utama</h3>
        <p>{{ $askeb->keluhan_utama ?? '-' }}</p>
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

            <div class="grid grid-cols-2 gap-6 mb-6 text-sm">

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

            </div>

            <div class="mb-4 text-sm leading-relaxed">

                <p>
                    Selama hamil ibu memeriksakan kehamilan <span class="font-semibold">{{ $askeb->jumlah_periksa ?? '-' }}</span> kali, status imunisasi (TT) <span class="font-semibold">{{ $askeb->status_imunisasi_tt ?? '-' }}</span>, jumlah tablet MMS yang telah diminum<span class="font-semibold">{{ $askeb->jumlah_mms ?? '-' }}</span> butir. Ibu merasakan gerak janin pada usia <span class="font-semibold">{{ $askeb->gerak_janin_usia ?? '-' }}</span> minggu/bulan. Keluhan yang pernah dirasakan selama kehamilan yaitu <span class="font-semibold">{{ $askeb->keluhan_hamil ?? '-' }}</span>. Obat yang didapat oleh ibu yaitu <span class="font-semibold">{{ $askeb->obat_didapat ?? '-' }}</span>.
                </p>

            </div>

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

            <div class="space-y-3 text-sm">

                <div>
                    <b>A. Pola nutrisi :</b>
                    {{ $askeb->pola_nutrisi ?? '-' }}
                </div>


                <div>
                    <b>B. Pola eliminasi :</b>

                    <div class="ml-6">
                        BAK : {{ $askeb->bak_frekuensi ?? '-' }} x/hari,
                        konsistensi {{ $askeb->bak_konsistensi ?? '-' }}
                    </div>

                    <div class="ml-6">
                        BAB : {{ $askeb->bab_frekuensi ?? '-' }} x/hari,
                        konsistensi {{ $askeb->bab_konsistensi ?? '-' }}
                    </div>

                </div>


                <div>
                    <b>C. Pola istirahat :</b>

                    <div class="ml-6 grid grid-cols-2">
                        <div>
                            Tidur siang : {{ $askeb->tidur_siang ?? '-' }} jam/hari
                        </div>

                        <div>
                            Tidur malam : {{ $askeb->tidur_malam ?? '-' }} jam/hari
                        </div>
                    </div>

                </div>


                <div>
                    <b>D. Pola aktivitas :</b>
                    {{ $askeb->pola_aktivitas ?? '-' }}
                </div>


                <div>
                    <b>E. Personal hygiene :</b>

                    <div class="ml-6">

                        Ibu mandi {{ $askeb->mandi ?? '-' }} kali/hari,

                        gosok gigi {{ $askeb->gosok_gigi ?? '-' }} kali/hari,

                        keramas {{ $askeb->keramas ?? '-' }} kali/minggu,

                        ganti baju {{ $askeb->ganti_baju ?? '-' }} kali/hari,

                        ganti celana dalam {{ $askeb->ganti_cd ?? '-' }} kali/hari

                    </div>

                </div>


                <div>
                    <b>F. Aktivitas seksual :</b>

                    Selama hamil ibu
                    {{ $askeb->aktivitas_seksual ?? '-' }}

                </div>


                <div>
                    <b>G. Pola kebiasaan :</b>

                    {{ $askeb->pola_kebiasaan ?? '-' }}

                </div>

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
                    <p>{{ $askeb->tradisi ?? '-' }}</p>
                </div>

                <div>
                    <span class="font-medium">Spiritual :</span>
                    <p>{{ $askeb->spiritual ?? '-' }}</p>
                </div>

                <div>
                    <span class="font-medium">Pengetahuan :</span>
                    <p>{{ $askeb->pengetahuan ?? '-' }}</p>
                </div>

            </div>

            <hr class="my-6">

            {{-- ================= DATA OBYEKTIF ================= --}}
            <h3 class="text-lg font-bold text-purple-700 mb-4">
                B. Data Obyektif
            </h3>

            {{-- ================= PEMERIKSAAN UMUM ================= --}}
            <h4 class="font-semibold mb-3">1. Pemeriksaan Umum</h4>

<div class="grid md:grid-cols-2 gap-4">

    <div class="flex justify-between border-b py-1">
        <span>Kesadaran</span>
        <span>{{ $askeb->kesadaran ?? '-' }}</span>
    </div>

    <div class="flex justify-between border-b py-1">
        <span>Tekanan Darah</span>
        <span>{{ $askeb->tekanan_darah ?? '-' }} mmHg</span>
    </div>

    <div class="flex justify-between border-b py-1">
        <span>Denyut Nadi</span>
        <span>{{ $askeb->denyut_nadi ?? '-' }} x/menit</span>
    </div>

    <div class="flex justify-between border-b py-1">
        <span>Pernafasan</span>
        <span>{{ $askeb->pernafasan ?? '-' }} x/menit</span>
    </div>

    <div class="flex justify-between border-b py-1">
        <span>Suhu Tubuh</span>
        <span>{{ $askeb->suhu ?? '-' }} °C</span>
    </div>

    <div class="flex justify-between border-b py-1">
        <span>LILA</span>
        <span>{{ $askeb->lila ?? '-' }} cm</span>
    </div>

    <div class="flex justify-between border-b py-1">
        <span>Berat/Tinggi Badan</span>
        <span>{{ $askeb->berat_tinggi_badan ?? '-' }} kg/cm</span>
    </div>

    <div class="flex justify-between border-b py-1">
        <span>Berat Sebelum Hamil</span>
        <span>{{ $askeb->berat_sebelum_hamil ?? '-' }} kg</span>
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

            <h4 class="font-semibold mb-2">4. Pemeriksaan Penunjang / Laboratorium</h4>

            <div class="grid grid-cols-2 gap-4 text-sm mb-4">

                <div>
                    <span class="font-medium">Tanggal :</span>
                    <p>{{ $askeb->lab_tanggal ?? '-' }}</p>
                </div>

                <div>
                    <span class="font-medium">Tempat :</span>
                    <p>{{ $askeb->lab_tempat ?? '-' }}</p>
                </div>

            </div>

            <div class="text-sm mb-6">
                <span class="font-medium">Hasil :</span>
                <p>{{ $askeb->lab_hasil ?? '-' }}</p>
            </div>

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

<h3 class="text-lg font-bold text-purple-700 mb-4">
    D. Penatalaksanaan
</h3>

<div class="mb-4">

    <p>
        <span class="font-semibold">Jam :</span>
        {{ $askeb->penatalaksanaans->first()->jam ?? '-' }}
    </p>

    <p>
        <span class="font-semibold">Tanggal :</span>
        {{ $askeb->penatalaksanaans->first()->tanggal ?? '-' }}
    </p>

</div>

@if($askeb->penatalaksanaans->count())

<ol class="list-decimal ml-6 space-y-1">

@foreach($askeb->penatalaksanaans as $item)

<li>
    {{ $item->tindakan }}
</li>

@endforeach

</ol>

@else

<p class="text-gray-500">Belum ada penatalaksanaan.</p>

@endif

        </div>

</x-app-layout>