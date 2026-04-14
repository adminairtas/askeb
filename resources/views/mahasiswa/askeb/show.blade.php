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
                        {{ \Carbon\Carbon::parse($revisi->created_at)->translatedFormat('d F Y H:i') }}
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
<div class="mb-6 ml-4 text-sm space-y-2">

    <div class="flex">
        <span class="w-56 font-medium"><b>Dosen Pembimbing</b></span>
        <span>: {{ $askeb->dosen->name ?? '-' }}</span>
    </div>

    <div class="flex">
        <span class="w-56 font-medium"><b>Mahasiswa</b></span>
        <span>: {{ $askeb->mahasiswa->name ?? '-' }}</span>
    </div>

</div>


        {{-- BIODATA --}}
        <h3 class="text-lg font-bold text-purple-700 mb-4">
            A. Data Subyektif
        </h3>
        <div class="mb-8">

            <h3 class="font-semibold text-lg mb-3">1. Biodata/Identitas</h3>

            <div class="ml-4 grid grid-cols-2 gap-x-10 text-sm leading-relaxed">

                {{-- BIODATA IBU --}}
                <div>
                    <h4 class="font-semibold mb-2">Biodata Ibu</h4>

                    <div class="space-y-1">
                        <div class="flex"><span class="w-32">Nama</span><span>: {{ $askeb->nama_ibu ?? '-' }}</span></div>
                        <div class="flex"><span class="w-32">Umur</span><span>: {{ $askeb->umur_ibu ?? '-' }} Tahun</span></div>
                        <div class="flex"><span class="w-32">Suku</span><span>: {{ $askeb->suku_ibu ?? '-' }}</span></div>
                        <div class="flex"><span class="w-32">Agama</span><span>: {{ $askeb->agama_ibu ?? '-' }}</span></div>
                        <div class="flex"><span class="w-32">Pendidikan</span><span>: {{ $askeb->pendidikan_ibu ?? '-' }}</span></div>
                        <div class="flex"><span class="w-32">Pekerjaan</span><span>: {{ $askeb->pekerjaan_ibu ?? '-' }}</span></div>
                        <div class="flex"><span class="w-32">Penghasilan</span><span>: Rp {{ number_format($askeb->penghasilan_ibu, 0, ',', '.') }}</span></div>
                    </div>
                </div>

                {{-- BIODATA SUAMI --}}
                <div>
                    <h4 class="font-semibold mb-2">Biodata Suami</h4>

                    <div class="space-y-1">
                        <div class="flex"><span class="w-32">Nama</span><span>: {{ $askeb->nama_suami ?? '-' }}</span></div>
                        <div class="flex"><span class="w-32">Umur</span><span>: {{ $askeb->umur_suami ?? '-' }} Tahun</span></div>
                        <div class="flex"><span class="w-32">Suku</span><span>: {{ $askeb->suku_suami ?? '-' }}</span></div>
                        <div class="flex"><span class="w-32">Agama</span><span>: {{ $askeb->agama_suami ?? '-' }}</span></div>
                        <div class="flex"><span class="w-32">Pendidikan</span><span>: {{ $askeb->pendidikan_suami ?? '-' }}</span></div>
                        <div class="flex"><span class="w-32">Pekerjaan</span><span>: {{ $askeb->pekerjaan_suami ?? '-' }}</span></div>
                        <div class="flex"><span class="w-32">Penghasilan</span><span>: Rp {{ number_format($askeb->penghasilan_suami, 0, ',', '.') }}</span></div>
                    </div>
                </div>

            </div>

            {{-- ALAMAT --}}
            <div class="ml-4 mt-4 text-sm">
                <div class="flex">
                    <span class="w-32 font-medium">Alamat</span>
                    <span>: {{ $askeb->alamat ?? '-' }}</span>
                </div>
            </div>

            <hr class="my-6">

            {{-- KELUHAN UTAMA --}}
            <div class="mb-8">
                <h3 class="font-semibold text-lg mb-3">2. Keluhan Utama</h3>

                <div class="ml-4 text-sm leading-relaxed">
                    {{ $askeb->keluhan_utama ?? '-' }}
                </div>
            </div>
            <hr class="my-6">

            <div class="my-6">

                {{-- ================= RIWAYAT MENSTRUASI ================= --}}
                <div class="mb-8">
                    <h3 class="font-semibold text-lg mb-4">3. Riwayat Menstruasi</h3>

                    <div class="ml-4 grid grid-cols-2 gap-x-10 gap-y-2 text-sm">

                        <div class="flex">
                            <span class="w-40">Menarche</span>
                            <span>: {{ $askeb->menarche ?? '-' }} th</span>
                        </div>

                        <div class="flex">
                            <span class="w-40">Lama Haid</span>
                            <span>: {{ $askeb->lama_haid ?? '-' }} hari</span>
                        </div>

                        <div class="flex">
                            <span class="w-40">Jumlah Haid</span>
                            <span>: {{ $askeb->jumlah_haid ?? '-' }} cc</span>
                        </div>

                        <div class="flex">
                            <span class="w-40">Karakteristik</span>
                            <span>: {{ $askeb->karakteristik_haid ?? '-' }}</span>
                        </div>

                        <div class="flex col-span-2">
                            <span class="w-40">Siklus Haid</span>
                            <span>: {{ $askeb->siklus_haid ?? '-' }}</span>
                        </div>

                    </div>
                </div>

                <hr class="my-6">

                {{-- ================= RIWAYAT PERKAWINAN ================= --}}
                <div class="mb-8">
                    <h3 class="font-semibold text-lg mb-3">4. Riwayat Perkawinan</h3>

                    <div class="ml-4 grid grid-cols-2 gap-x-10 gap-y-2 text-sm">

                        <div class="flex">
                            <span class="w-48">Usia Pertama Menikah</span>
                            <span>: {{ $askeb->usia_pertama_menikah ?? '-' }} th</span>
                        </div>

                        <div class="flex">
                            <span class="w-48">Lama Menikah</span>
                            <span>: {{ $askeb->lama_menikah ?? '-' }} th</span>
                        </div>

                        <div class="flex col-span-2">
                            <span class="w-48">Status Pernikahan</span>
                            <span>: {{ $askeb->status_pernikahan ?? '-' }}</span>
                        </div>

                    </div>
                </div>

                <hr class="my-6 border-gray-200">

                {{-- RIWAYAT OBSTETRI --}}
                <h3 class="font-semibold text-lg mb-3">
                    5. Riwayat Obstetri
                </h3>

                <div class="overflow-x-auto mb-6">
                    <table class="w-full border border-collapse text-sm">

                        <thead class="bg-gray-100 text-center">
                            <tr>
                                <th class="border p-2 w-10">No</th>
                                <th class="border p-2">G/P/A</th>
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
                            <tr class="odd:bg-white even:bg-gray-50">

                                <td class="border p-2 text-center">{{ $i+1 }}</td>

                                <td class="border p-2 text-center">
                                    {{ $ob->kehamilan ?? '-' }}
                                </td>

                                <td class="border p-2 text-center">
                                    {{ $ob->jenis_persalinan ?? '-' }}
                                </td>

                                <td class="border p-2">
                                    {{ $ob->penolong ?? '-' }}
                                </td>

                                <td class="border p-2">
                                    {{ $ob->tempat_persalinan ?? '-' }}
                                </td>

                                <td class="border p-2 text-center">
                                    {{ $ob->jk_bayi ?? '-' }}
                                </td>

                                <td class="border p-2 text-center">
                                    {{ $ob->bb_pb ?? '-' }}
                                </td>

                                <td class="border p-2 text-center">
                                    {{ $ob->umur_bayi ?? '-' }}
                                </td>

                                <td class="border p-2">
                                    {{ $ob->keterangan_bayi ?? '-' }}
                                </td>

                                <td class="border p-2 text-center">
                                    {{ $ob->laktasi ?? '-' }}
                                </td>

                                <td class="border p-2">
                                    {{ $ob->penyulit_nifas ?? '-' }}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <hr class="my-6">
                {{-- ================= RIWAYAT KONTRASEPSI ================= --}}
                <div class="mb-8">
                    <h3 class="font-semibold text-lg mb-3">
                        6. Riwayat Kontrasepsi
                    </h3>

                    <div class="ml-4 grid grid-cols-2 gap-x-6 gap-y-2 text-sm leading-relaxed">
                        <p>
                            <span class="font-medium">Sebelum Hamil Ibu :</span>
                            {{ $askeb->sebelum_hamil_ibu ?? '-' }}
                        </p>
                    </div>
                </div>

                <hr class="my-6">

                {{-- ================= RIWAYAT KEHAMILAN ================= --}}
                <div class="mb-8">
                    <h3 class="font-semibold text-lg mb-3">
                        7. Riwayat Kehamilan Sekarang
                    </h3>

                    <div class="ml-4 grid grid-cols-2 gap-x-6 gap-y-2 text-sm leading-relaxed">

                        <div>
                            <span class="font-medium">HPHT :</span>
                            {{ $askeb->hpht ? \Carbon\Carbon::parse($askeb->hpht)->locale('id')->translatedFormat('d F Y') : '-' }}
                        </div>

                        <div>
                            <span class="font-medium">HPL :</span>
                            {{ $askeb->hpl ? \Carbon\Carbon::parse($askeb->hpl)->locale('id')->translatedFormat('d F Y') : '-' }}
                        </div>

                    </div>

                    <br>
                    <div class="ml-4 text-sm leading-relaxed text-justify">
                        <p>
                            Selama hamil ibu memeriksakan kehamilan <span class="font-semibold">{{ $askeb->jumlah_periksa ?? '-' }}</span> kali, status imunisasi (TT) <span class="font-semibold">{{ $askeb->status_imunisasi_tt ?? '-' }}</span>, jumlah tablet MMS yang telah diminum <span class="font-semibold">{{ $askeb->jumlah_mms ?? '-' }}</span> butir. Ibu merasakan gerak janin pada usia <span class="font-semibold">{{ $askeb->gerak_janin_usia ?? '-' }}</span> minggu/bulan. Keluhan yang pernah dirasakan selama kehamilan yaitu <span class="font-semibold">{{ $askeb->keluhan_hamil ?? '-' }}</span>. Obat yang didapat oleh ibu yaitu <span class="font-semibold">{{ $askeb->obat_didapat ?? '-' }}</span>.
                        </p>
                    </div>

                </div>
            </div>
            <hr class="my-6">

            <div class="mb-8">
                <h3 class="font-semibold text-lg mb-3">
                    8. Riwayat Kesehatan Ibu
                </h3>

                <div class="ml-4 text-sm leading-relaxed text-justify">
                    <div class="mb-6 text-sm">
                        {{ $askeb->riwayat_kesehatan_ibu ?? '-' }}
                    </div>
                </div>
            </div>

            <hr class="my-6">
            <div class="mb-8">

                <h3 class="font-semibold text-lg mb-3">
                    9. Riwayat Kesehatan Keluarga
                </h3>

                <div class="ml-4 text-sm leading-relaxed">
                    <div class="mb-6 text-sm">
                        {{ $askeb->riwayat_kesehatan_keluarga ?? '-' }}
                    </div>
                </div>
            </div>

            <hr class="my-6">

            <div class="mb-8">
                <h3 class="font-semibold text-lg mb-3">
                    10. Pola Fungsional Kesehatan
                </h3>

                <div class="ml-4 text-sm space-y-3">

                    {{-- A --}}
                    <div class="flex">
                        <span class="w-56 font-medium">A. Pola nutrisi</span>
                        <span>: {{ $askeb->pola_nutrisi ?? '-' }}</span>
                    </div>

                    {{-- B --}}
                    <div>
                        <div class="flex">
                            <span class="w-56 font-medium">B. Pola eliminasi </span> <span>:</span>
                        </div>

                        <div class="ml-6 space-y-1">
                            <div>- BAK : {{ $askeb->bak_frekuensi ?? '-' }} x/hari ({{ $askeb->bak_konsistensi ?? '-' }})</div>
                            <div>- BAB : {{ $askeb->bab_frekuensi ?? '-' }} x/hari ({{ $askeb->bab_konsistensi ?? '-' }})</div>
                        </div>
                    </div>

                    {{-- C --}}
                    <div>
                        <div class="flex">
                            <span class="w-56 font-medium">C. Pola istirahat</span> <span>:</span>
                        </div>

                        <div class="ml-6 space-y-1">
                            <div>- Tidur siang : {{ $askeb->tidur_siang ?? '-' }} jam/hari</div>
                            <div>- Tidur malam : {{ $askeb->tidur_malam ?? '-' }} jam/hari</div>
                        </div>
                    </div>

                    {{-- D --}}
                    <div>
                        <div class="flex">
                            <span class="w-56 font-medium">D. Pola aktivitas</span>
                            <span>: {{ $askeb->pola_aktivitas ?? '-' }} </span>
                        </div>
                    </div>

                    {{-- E --}}
                    <div>
                        <div class="flex">
                            <span class="w-56 font-medium">E. Personal hygiene</span> <span>:</span>
                        </div>

                        <div class="ml-6 space-y-1">
                            <div>- Mandi : {{ $askeb->mandi ?? '-' }} x/hari</div>
                            <div>- Gosok gigi : {{ $askeb->gosok_gigi ?? '-' }} x/hari</div>
                            <div>- Keramas : {{ $askeb->keramas ?? '-' }} x/minggu</div>
                            <div>- Ganti baju : {{ $askeb->ganti_baju ?? '-' }} x/hari</div>
                            <div>- Ganti celana dalam : {{ $askeb->ganti_cd ?? '-' }} x/hari</div>
                        </div>
                    </div>

                    {{-- F --}}
                    <div>
                        <div class="flex">
                            <span class="w-56 font-medium">F. Pola aktivitas</span>
                            <span>: {{ $askeb->pola_aktivitas ?? '-' }}</span>
                        </div>
                    </div>

                    {{-- G --}}
                    <div>
                        <div class="flex">
                            <span class="w-56 font-medium">G. Pola kebiasaan</span>
                            <span>: {{ $askeb->pola_kebiasaan ?? '-' }}</span>
                        </div>
                    </div>
                </div>
                <hr class="my-6">


                <div class="mb-8">
                    <h3 class="font-semibold text-lg mb-3">
                        11. Riwayat Sosial Budaya, Pengetahuan dan Spiritual
                    </h3>

                    <div class="ml-4 grid grid-cols-2 gap-x-10 gap-y-2 text-sm">

                        <div class="flex">
                            <span class="w-56">Kehamilan Ini</span>
                            <span>: {{ $askeb->kehamilan_ini ?? '-' }}</span>
                        </div>

                        <div class="flex">
                            <span class="w-56">Kondisi Ibu</span>
                            <span>:
                                @if($askeb->kondisi_ibu_kehamilan == 'Senang')
                                Senang dengan Kehamilannya
                                @elseif($askeb->kondisi_ibu_kehamilan == 'Tidak_senang')
                                Tidak Senang dengan Kehamilannya
                                @else
                                -
                                @endif
                            </span>
                        </div>

                        <div class="flex">
                            <span class="w-56">Tradisi</span>
                            <span>: {{ $askeb->tradisi ?? '-' }}</span>
                        </div>

                        <div class="flex">
                            <span class="w-56">Spiritual</span>
                            <span>: {{ $askeb->spiritual ?? '-' }}</span>
                        </div>

                        <div class="flex col-span-2">
                            <span class="w-56">Pengetahuan</span>
                            <span>: {{ $askeb->pengetahuan ?? '-' }}</span>
                        </div>

                    </div>
                </div>

                <hr class="my-6">
                {{-- ================= DATA OBYEKTIF ================= --}}
                <h3 class="text-lg font-bold text-purple-700 mb-4">
                    B. Data Obyektif
                </h3>

                {{-- ================= PEMERIKSAAN UMUM ================= --}}
                <div class="mb-8">
                    <h4 class="font-semibold mb-3">1. Pemeriksaan Umum</h4>

                    <div class="ml-4 space-y-2 text-sm">

                        <div class="flex">
                            <span class="w-56 font-medium">A. Kesadaran</span>
                            <span>: {{ $askeb->kesadaran ?? '-' }}</span>
                        </div>

                        <div class="flex">
                            <span class="w-56 font-medium">B. Tekanan Darah</span>
                            <span>: {{ $askeb->tekanan_darah ?? '-' }} mmHg</span>
                        </div>

                        <div class="flex">
                            <span class="w-56 font-medium">C. Denyut Nadi</span>
                            <span>: {{ $askeb->denyut_nadi ?? '-' }} x/menit</span>
                        </div>

                        <div class="flex">
                            <span class="w-56 font-medium">D. Pernafasan</span>
                            <span>: {{ $askeb->pernafasan ?? '-' }} x/menit</span>
                        </div>

                        <div class="flex">
                            <span class="w-56 font-medium">E. Suhu Tubuh</span>
                            <span>: {{ $askeb->suhu ?? '-' }} °C</span>
                        </div>

                        <div class="flex">
                            <span class="w-56 font-medium">F. LILA</span>
                            <span>: {{ $askeb->lila ?? '-' }} cm</span>
                        </div>

                        <div class="flex">
                            <span class="w-56 font-medium">G. Berat/Tinggi Badan</span>
                            <span>: {{ $askeb->berat_tinggi_badan ?? '-' }} kg/cm</span>
                        </div>

                        <div class="flex">
                            <span class="w-56 font-medium">H. Berat Sebelum Hamil</span>
                            <span>: {{ $askeb->berat_sebelum_hamil ?? '-' }} kg</span>
                        </div>

                    </div>
                </div>
            </div>

            <hr class="my-6">

            <div class="mb-8">
                <h4 class="font-semibold mb-3">2. Pemeriksaan Fisik</h4>

                <div class="ml-4 space-y-2 text-sm">

                    <div class="flex"><span class="w-56 font-medium">A. Kepala</span><span>: {{ $askeb->kepala ?? '-' }}</span></div>
                    <div class="flex"><span class="w-56 font-medium">B. Muka</span><span>: {{ $askeb->muka ?? '-' }}</span></div>
                    <div class="flex"><span class="w-56 font-medium">C. Mata</span><span>: {{ $askeb->mata ?? '-' }}</span></div>
                    <div class="flex"><span class="w-56 font-medium">D. Hidung</span><span>: {{ $askeb->hidung ?? '-' }}</span></div>
                    <div class="flex"><span class="w-56 font-medium">E. Mulut</span><span>: {{ $askeb->mulut ?? '-' }}</span></div>
                    <div class="flex"><span class="w-56 font-medium">F. Leher</span><span>: {{ $askeb->leher ?? '-' }}</span></div>
                    <div class="flex"><span class="w-56 font-medium">G. Dada</span><span>: {{ $askeb->dada ?? '-' }}</span></div>
                    <div class="flex"><span class="w-56 font-medium">H. Abdomen</span><span>: {{ $askeb->abdomen ?? '-' }}</span></div>
                </div>

                {{-- LEOPOLD --}}
                <div class="ml-4 mt-3 text-sm max-w-2xl">

                    <table class="w-full border border-collapse text-sm">

                        <tr>
                            <td class="border px-3 py-2 w-1/3">
                                <strong>Leopold I</strong><br>
                                {{ $askeb->leopold_i ?? '-' }}
                            </td>

                            <td class="border px-3 py-2 w-1/3">
                                <strong>Leopold II</strong><br>
                                {{ $askeb->leopold_ii ?? '-' }}
                            </td>

                            <td class="border px-3 py-2 w-1/3">
                                <strong>Leopold III</strong><br>
                                {{ $askeb->leopold_iii ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="border px-3 py-2">
                                <strong>Leopold IV</strong><br>
                                {{ $askeb->leopold_iv ?? '-' }}
                            </td>

                            <td class="border px-3 py-2">
                                <strong>TBJ</strong><br>
                                {{ $askeb->tbj ?? '-' }} gram
                            </td>

                            <td class="border px-3 py-2">
                                <strong>DJJ</strong><br>
                                {{ $askeb->djj ?? '-' }}
                            </td>
                        </tr>

                    </table>

                </div>
                <br>
                {{-- BAGIAN AKHIR --}}
                <div class="ml-4 space-y-2 text-sm">
                    <div class="flex"><span class="w-56 font-medium">I. Genetalia</span><span>: {{ $askeb->genetalia ?? '-' }}</span></div>
                    <div class="flex"><span class="w-56 font-medium">J. Anus</span><span>: {{ $askeb->anus ?? '-' }}</span></div>
                    <div class="flex"><span class="w-56 font-medium">K. Ekstremitas</span><span>: {{ $askeb->ekstemitas ?? '-' }}</span></div>
                </div>
            </div>

            <hr class="my-6">
            <div class="mb-8">
                <h4 class="font-semibold mb-3">3. Pemeriksaan Panggul Luar</h4>

                <div class="ml-4 grid grid-cols-2 gap-x-10 gap-y-2 text-sm">

                    <div class="flex">
                        <span class="w-56">Distansia Spinarum</span>
                        <span>: {{ $askeb->distansia_sinarum ?? '-' }} cm</span>
                    </div>

                    <div class="flex">
                        <span class="w-56">Distansia Kristarum</span>
                        <span>: {{ $askeb->distansia_kristarum ?? '-' }} cm</span>
                    </div>

                    <div class="flex">
                        <span class="w-56">Konjugata Eksterna</span>
                        <span>: {{ $askeb->konjugata_eksterna ?? '-' }} cm</span>
                    </div>

                    <div class="flex">
                        <span class="w-56">Lingkar Panggul</span>
                        <span>: {{ $askeb->lingkar_panggul ?? '-' }} cm</span>
                    </div>

                </div>
            </div>
            <hr class="my-6">

            <div class="mb-8">
                <h4 class="font-semibold mb-2">4. Pemeriksaan Penunjang / Laboratorium</h4>

                <div class="ml-4 grid grid-cols-2 gap-x-10 gap-y-2 text-sm">

                    <div class="flex">
                        <span class="w-56">Tanggal</span>
                        <span>: {{ $askeb->lab_tanggal ?? '-' }}</span>
                    </div>

                    <div class="flex">
                        <span class="w-56">Tempat</span>
                        <span>: {{ $askeb->lab_tempat ?? '-' }}</span>
                    </div>

                    <div class="flex col-span-2">
                        <span class="w-56">Hasil</span>
                        <span>: {{ $askeb->lab_hasil ?? '-' }}</span>
                    </div>

                </div>
            </div>

            <hr class="my-6">
            {{-- DIAGNOSIS --}}
            <h3 class="text-lg font-bold text-purple-700 mb-4">
                C. Analisis Data
            </h3>
            <div class="ml-4 space-y-2 text-sm">
                <div class="flex"><span class="w-56 font-medium">Diagnosis:</span><span>: {{ $askeb->diagnosis ?? '-' }}</span></div>
                <div class="flex"><span class="w-56 font-medium">Masalah Potensial:</span><span>: {{ $askeb->masalah_potensial ?? '-' }}</span></div>
                <div class="flex"><span class="w-56 font-medium">Kebutuhan Segera:</span><span>: {{ $askeb->kebutuhan_segera ?? '-' }}</span></div>
            </div>

            <hr class="my-6">
            {{-- PENATALAKSANAAN --}}
            <h3 class="text-lg font-bold text-purple-700 mb-4">
                D. Penatalaksanaan
            </h3>

            <div class="ml-4 mb-4 space-y-2 text-sm">

                <div class="flex">
                    <span class="w-56 font-medium">Jam</span>
                    <span>:
                        {{ optional($askeb->penatalaksanaans->first())->jam 
                ? \Carbon\Carbon::parse(optional($askeb->penatalaksanaans->first())->jam)->format('H:i') 
                : '-' }}
                    </span>
                </div>

                <div class="flex">
                    <span class="w-56 font-medium">Tanggal</span>
                    <span>:
                        {{ optional($askeb->penatalaksanaans->first())->tanggal 
                ? \Carbon\Carbon::parse(optional($askeb->penatalaksanaans->first())->tanggal)->locale('id')->translatedFormat('d F Y') 
                : '-' }}
                    </span>
                </div>

            </div>

            @if($askeb->penatalaksanaans->count())

            <ol class="list-decimal ml-10 space-y-1 text-sm">
                @foreach($askeb->penatalaksanaans as $item)
                <li>{{ $item->tindakan }}</li>
                @endforeach
            </ol>

            @else

            <p class="text-gray-500 text-sm ml-4">Belum ada penatalaksanaan.</p>

            @endif

        </div>

</x-app-layout>