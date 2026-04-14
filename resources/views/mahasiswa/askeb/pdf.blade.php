<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
            line-height: 1.5;
            text-align: justify;
        }

        /* LABEL UNTUK TITIK DUA (WAJIB) */
        .label {
            display: inline-block;
            width: 150px;
        }

        /* Judul A B C D */
        .section {
            font-weight: bold;
            color: #6b21a8;
            font-size: 14px;
            margin-top: 12px;
            margin-bottom: 4px;
            page-break-after: avoid;
        }

        /* Judul nomor */
        .subsection {
            font-weight: bold;
            font-size: 13px;
            margin-top: 6px;
            margin-bottom: 2px;
            page-break-after: avoid;
        }

        /* paragraf */
        p {
            margin: 3px 0;

            orphans: 2;
            widows: 2;
        }

        /* indent seperti Word */
        .indent {
            margin-left: 15px;

        }

        .indent2 {
            margin-left: 0px;

        }

        /* list (kalau dipakai) */
        ol {
            margin: 4px 0 4px 18px;
            padding: 0;

        }

        li {
            margin: 2px 0;

        }

        /* tabel (jaga jangan kepotong) */


        /* garis */
        hr {
            margin: 12px 0;
            border: 0.5px solid #999;
        }

        /* margin halaman PDF */
        @page {
            margin-top: 0.6in;
            margin-left: 0.9in;
            margin-bottom: 0.6in;
            margin-right: 0.7in;
        }

        /* tanda tangan */
        .signature {
            width: 100%;
            text-align: right;
            margin-top: 40px;
            page-break-inside: avoid;
        }

        .signature img {
            width: 10px;
            margin: 10px 0;
        }

        @page {
            margin-top: 0.6in;
            margin-left: 0.9in;
            margin-bottom: 0.8in;
            /* tambahin ruang footer */
            margin-right: 0.7in;
        }

        footer {
            position: fixed;
            bottom: -10px;
            left: 0;
            right: 0;
            height: 40px;
            font-size: 10px;
        }

        .footer-left {
            position: absolute;
            left: 0;
        }
        
        .footer-right {
            position: absolute;
            right: 0;
        }
        
    </style>

</head>

<body>

    <div class="paragraph" style="font-size: 20px;">
        <b>LAPORAN ANC : No. {{ $no }}</b>
    </div>
    <br>

    <p>
        <span class="label"><b>Asuhan Kebidanan Pada</b></span> : {{ $askeb->asuhan_pada ?? '-' }}
    </p>

    <table style="width:100%;">
        <tr>

            {{-- KOLOM KIRI --}}
            <td style="width:50%; vertical-align:top;">
                <p>
                    <span class="label">Tanggal Pengkajian</span> :
                    {{ $askeb->tanggal_pengkajian 
                    ? \Carbon\Carbon::parse($askeb->tanggal_pengkajian)->locale('id')->translatedFormat('d F Y') 
                    : '-' }}
                </p>

                <p>
                    <span class="label">Tempat</span> :
                    {{ $askeb->tempat ?? '-' }}
                </p>
            </td>

            {{-- KOLOM KANAN --}}
            <td style="width:50%; vertical-align:top;">
                <p>
                    <span class="label">Pukul</span> :
                    {{ $askeb->pukul 
                    ? \Carbon\Carbon::parse($askeb->pukul)->format('H:i') 
                    : '-' }} WIB
                </p>

                <p>
                    <span class="label">Oleh</span> :
                    {{ optional($askeb->mahasiswa)->name ?? '-' }}
                </p>
            </td>

        </tr>
    </table>
    <hr>

    <h3 class="section">A. Data Subyektif</h3>

    <h4 class="subsection">1. Biodata / Identitas</h4>

    <table style="width:100%;">
        <tr>

            {{-- BIODATA IBU --}}
            <td style="width:50%; vertical-align:top; padding-right:10px;">
                <div class="indent">
                    <p><span class="label"><b>BIODATA IBU</b></span></p>
                    <p><span class="label">Nama</span> : {{ $askeb->nama_ibu ?? '-' }}</p>
                    <p><span class="label">Umur</span> : {{ $askeb->umur_ibu ?? '-' }} Tahun</p>
                    <p><span class="label">Suku</span> : {{ $askeb->suku_ibu ?? '-' }}</p>
                    <p><span class="label">Agama</span> : {{ $askeb->agama_ibu ?? '-' }}</p>
                    <p><span class="label">Pendidikan</span> : {{ $askeb->pendidikan_ibu ?? '-' }}</p>
                    <p><span class="label">Pekerjaan</span> : {{ $askeb->pekerjaan_ibu ?? '-' }}</p>
                    <p><span class="label">Penghasilan</span> : Rp {{ number_format($askeb->penghasilan_ibu ?? 0, 0, ',', '.') }}</p>
                    <br>
                    <p><span class="label">Alamat</span> : {{ $askeb->alamat ?? '-' }}</p>
                </div>
            </td>
            {{-- BIODATA SUAMI --}}
            <td style="width:50%; vertical-align:top; padding-left:10px;">
                <div class="indent">
                    <p><span class="label"><b>BIODATA SUAMI</b></span></p>
                    <p><span class="label">Nama</span> : {{ $askeb->nama_suami ?? '-' }}</p>
                    <p><span class="label">Umur</span> : {{ $askeb->umur_suami ?? '-' }} Tahun</p>
                    <p><span class="label">Suku</span> : {{ $askeb->suku_suami ?? '-' }}</p>
                    <p><span class="label">Agama</span> : {{ $askeb->agama_suami ?? '-' }}</p>
                    <p><span class="label">Pendidikan</span> : {{ $askeb->pendidikan_suami ?? '-' }}</p>
                    <p><span class="label">Pekerjaan</span> : {{ $askeb->pekerjaan_suami ?? '-' }}</p>
                    <p><span class="label">Penghasilan</span> : Rp {{ number_format($askeb->penghasilan_suami ?? 0, 0, ',', '.') }}</p>
                </div>
            </td>
        </tr>
    </table>


    <h4 class="subsection">2. Keluhan Utama</h4>

    <p class="indent">
        {{ $askeb->keluhan_utama ?? '-' }}
    </p>



    <h4 class="subsection">3. Riwayat Menstruasi</h4>

    <table style="width:100%;">
        <tr>
            {{-- KOLOM KIRI --}}
            <td style="width:50%; vertical-align:top;">

                <p><span class="label">Menarche</span> : {{ $askeb->menarche ?? '-' }} tahun</p>
                <p><span class="label">Siklus Haid</span> : {{ $askeb->siklus_haid ?? '-' }}</p>
                <p><span class="label">Lama Haid</span> : {{ $askeb->lama_haid ?? '-' }} hari</p>

            </td>

            {{-- KOLOM KANAN --}}
            <td style="width:50%; vertical-align:top;">

                <p><span class="label">Jumlah Haid</span> : {{ $askeb->jumlah_haid ?? '-' }} cc</p>
                <p><span class="label">Karakteristik</span> : {{ $askeb->karakteristik_haid ?? '-' }}</p>

            </td>
        </tr>
    </table>



    <h4 class="subsection">4. Riwayat Perkawinan</h4>

    <div class="indent">
        <p>
            Usia pertama menikah {{ $askeb->usia_pertama_menikah ?? '-' }} tahun,
            lama menikah {{ $askeb->lama_menikah ?? '-' }} tahun,
            status pernikahan {{ $askeb->status_pernikahan ?? '-' }}.
        </p>
    </div>


    <h4 class="subsection">5. Riwayat Obstetri</h4>

    <table style="width:100%; border-collapse:collapse; font-size:11px;" border="1">
        <thead>
            <tr style="background:#f3f3f3; text-align:center;">
                <th style="padding:4px;">No</th>
                <th style="padding:4px;">Kehamilan</th>
                <th style="padding:4px;">Jenis</th>
                <th style="padding:4px;">Penolong</th>
                <th style="padding:4px;">Tempat</th>
                <th style="padding:4px;">JK</th>
                <th style="padding:4px;">BB/PB</th>
                <th style="padding:4px;">Umur</th>
                <th style="padding:4px;">Keterangan</th>
                <th style="padding:4px;">Laktasi</th>
                <th style="padding:4px;">Penyulit</th>
            </tr>
        </thead>

        <tbody>
            @forelse($askeb->obstetris as $i => $o)
            <tr>
                <td style="text-align:center; padding:3px;">{{ $i+1 }}</td>
                <td style="text-align:center;">{{ $o->kehamilan ?? '-' }}</td>
                <td>{{ $o->jenis_persalinan ?? '-' }}</td>
                <td>{{ $o->penolong ?? '-' }}</td>
                <td>{{ $o->tempat_persalinan ?? '-' }}</td>
                <td style="text-align:center;">{{ $o->jk_bayi ?? '-' }}</td>
                <td style="text-align:center;">{{ $o->bb_pb ?? '-' }}</td>
                <td style="text-align:center;">{{ $o->umur_bayi ?? '-' }}</td>
                <td>{{ $o->keterangan_bayi ?? '-' }}</td>
                <td style="text-align:center;">{{ $o->laktasi ?? '-' }}</td>
                <td>{{ $o->penyulit_nifas ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="11" style="text-align:center; padding:5px;">
                    Tidak ada data riwayat obstetri
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h4 class="subsection">6. Riwayat Kontrasepsi</h4>

    <p class="indent">
        <span class="label">Kontrasepsi</span> : {{ $askeb->sebelum_hamil_ibu ?? '-' }}
    </p>

    <h4 class="subsection">7. Riwayat Kehamilan Sekarang</h4>

    <table style="width:100%;">
        <tr>

            {{-- KOLOM KIRI --}}
            <td style="width:50%; vertical-align:top;">
                <p>
                    <span class="label">HPHT</span> :
                    {{ $askeb->hpht 
                    ? \Carbon\Carbon::parse($askeb->hpht)->locale('id')->translatedFormat('d F Y') 
                    : '-' }}
                </p>
            </td>

            {{-- KOLOM KANAN --}}
            <td style="width:50%; vertical-align:top;">
                <p>
                    <span class="label">HPL</span> :
                    {{ $askeb->hpl 
                    ? \Carbon\Carbon::parse($askeb->hpl)->locale('id')->translatedFormat('d F Y') 
                    : '-' }}
                </p>
            </td>

        </tr>
    </table>

    <p style="text-align: justify;">
        Selama hamil, ibu memeriksakan kehamilan sebanyak {{ $askeb->jumlah_periksa ?? '-' }} kali,
        status imunisasi TT {{ $askeb->status_imunisasi_tt ?? '-' }},
        jumlah tablet MMS {{ $askeb->jumlah_mms ?? '-' }} butir,
        mulai merasakan gerakan janin usia {{ $askeb->gerak_janin_usia ?? '-' }} minggu/bulan,
        keluhan selama kehamilan {{ $askeb->keluhan_hamil ?? '-' }},
        dan obat yang diperoleh ibu {{ $askeb->obat_didapat ?? '-' }}.
    </p>
    </div>

    <h4 class="subsection">8. Riwayat Kesehatan Ibu</h4>

    <p class="indent">
        {{ $askeb->riwayat_kesehatan_ibu ?? '-' }}
    </p>

    <h4 class="subsection">9. Riwayat Kesehatan Keluarga</h4>

    <p class="indent">
        {{ $askeb->riwayat_kesehatan_keluarga ?? '-' }}
    </p>

    <h4 class="subsection">10. Pola Fungsional Kesehatan</h4>

    <div class="indent">

        <p><span class="label"><b>A. Pola Nutrisi</b></span> : {{ $askeb->pola_nutrisi ?? '-' }}</p>

        <p><span class="label"><b>B. Pola Eliminasi</b></span></p>
        <div class="indent2">

            <div>
                <span class="label">1) BAK</span>
                <span>: {{ $askeb->bak_frekuensi ?? '-' }} x/hari ({{ $askeb->bak_konsistensi ?? '-' }})</span>
            </div>

            <div>
                <span class="label">2) BAB</span>
                <span>: {{ $askeb->bab_frekuensi ?? '-' }} x/hari ({{ $askeb->bab_konsistensi ?? '-' }})</span>
            </div>

        </div>

        <p><span class="label"><b>C. Pola Istirahat</b></span></p>
        <div class="indent2">
            <p><span class="label">1) Tidur siang</span> : {{ $askeb->tidur_siang ?? '-' }} jam/hari</p>
            <p><span class="label">2) Tidur malam</span> : {{ $askeb->tidur_malam ?? '-' }} jam/hari</p>
        </div>

        <p><span class="label"><b>D. Pola Aktivitas</b></span> : {{ $askeb->pola_aktivitas ?? '-' }}</p>

        <p><span class="label"><b>E. Personal Hygiene</b></span></p>
        <div class="indent2">
            <p><span class="label">1) Mandi</span> : {{ $askeb->mandi ?? '-' }} kali/hari</p>
            <p><span class="label">2) Gosok gigi</span> : {{ $askeb->gosok_gigi ?? '-' }} kali/hari</p>
            <p><span class="label">3) Keramas</span> : {{ $askeb->keramas ?? '-' }} kali/minggu</p>
            <p><span class="label">4) Ganti baju</span> : {{ $askeb->ganti_baju ?? '-' }} kali/hari</p>
            <p><span class="label">5) Ganti celana dalam</span> : {{ $askeb->ganti_cd ?? '-' }} kali/hari</p>
        </div>

        <p><span class="label"><b>F. Aktivitas Seksual</b></span> : {{ $askeb->aktivitas_seksual ?? '-' }}</p>

        <p><span class="label"><b>G. Pola Kebiasaan</b></span> : {{ $askeb->pola_kebiasaan ?? '-' }}</p>

    </div>

    <h4 class="subsection">11. Riwayat Sosial Budaya, Pengetahuan dan Spiritual</h4>

    <div class="indent">

        <p><span class="label"><b>A. Kehamilan Ini</b></span> : {{ $askeb->kehamilan_ini ?? '-' }}</p>

        <p><span class="label"><b>B. Kondisi Ibu</b></span> :
            @if($askeb->kondisi_ibu_kehamilan == 'Senang')
            Senang dengan kehamilannya
            @elseif($askeb->kondisi_ibu_kehamilan == 'Tidak_senang')
            Tidak senang dengan kehamilannya
            @else
            -
            @endif
        </p>

        <p><span class="label"><b>C. Tradisi</b></span> : {{ $askeb->tradisi ?? '-' }}</p>
        <p><span class="label"><b>D. Spiritual</b></span> : {{ $askeb->spiritual ?? '-' }}</p>
        <p><span class="label"><b>E. Pengetahuan</b></span> : {{ $askeb->pengetahuan ?? '-' }}</p>

    </div>
    <hr class="my-6">

    <h3 class="section">B. Data Obyektif</h3>

    <h4 class="subsection">1. Pemeriksaan Umum</h4>

    <div class="indent">

        <p><span class="label">A. Kesadaran</span> : {{ $askeb->kesadaran ?? '-' }}</p>
        <p><span class="label">B. Tekanan Darah</span> : {{ $askeb->tekanan_darah ?? '-' }} mmHg</p>
        <p><span class="label">C. Denyut Nadi</span> : {{ $askeb->denyut_nadi ?? '-' }} x/menit</p>
        <p><span class="label">D. Pernafasan</span> : {{ $askeb->pernafasan ?? '-' }} x/menit</p>
        <p><span class="label">E. Suhu</span> : {{ $askeb->suhu ?? '-' }} °C</p>
        <p><span class="label">F. LILA</span> : {{ $askeb->lila ?? '-' }} cm</p>
        <p><span class="label">G. Berat / Tinggi Badan</span> : {{ $askeb->berat_tinggi_badan ?? '-' }} kg</p>
        <p><span class="label">H. BB Sebelum Hamil</span> : {{ $askeb->berat_sebelum_hamil ?? '-' }} kg</p>

    </div>

    <h4 class="subsection">2. Pemeriksaan Fisik</h4>

    <div class="indent">

        <p><span class="label">A. Kepala</span> : {{ $askeb->kepala ?? '-' }}</p>
        <p><span class="label">B. Muka</span> : {{ $askeb->muka ?? '-' }}</p>
        <p><span class="label">C. Mata</span> : {{ $askeb->mata ?? '-' }}</p>
        <p><span class="label">D. Hidung</span> : {{ $askeb->hidung ?? '-' }}</p>
        <p><span class="label">E. Mulut</span> : {{ $askeb->mulut ?? '-' }}</p>
        <p><span class="label">F. Leher</span> : {{ $askeb->leher ?? '-' }}</p>
        <p><span class="label">G. Dada</span> : {{ $askeb->dada ?? '-' }}</p>

        {{-- ABDOMEN --}}
        <p><span class="label">H. Abdomen</span> : {{ $askeb->abdomen ?? '-' }}</p>

        {{-- LEOPOLD --}}
        <div class="indent2">
            <p><span class="label">- Leopold I</span> : {{ $askeb->leopold_i ?? '-' }}</p>
            <p><span class="label">- Leopold II</span> : {{ $askeb->leopold_ii ?? '-' }}</p>
            <p><span class="label">- Leopold III</span> : {{ $askeb->leopold_iii ?? '-' }}</p>
            <p><span class="label">- Leopold IV</span> : {{ $askeb->leopold_iv ?? '-' }}</p>
            <p><span class="label">- TBJ</span> : {{ $askeb->tbj ?? '-' }} gram</p>
            <p><span class="label">- DJJ</span> : {{ $askeb->djj ?? '-' }} x/menit</p>
        </div>

        <p><span class="label">I. Genetalia</span> : {{ $askeb->genetalia ?? '-' }}</p>
        <p><span class="label">J. Anus</span> : {{ $askeb->anus ?? '-' }}</p>
        <p><span class="label">K. Ekstremitas</span> : {{ $askeb->ekstremitas ?? '-' }}</p>

    </div>
    <hr>

    <h4 class="subsection">3. Pemeriksaan Panggul Luar</h4>

    <table style="width:100%;">
        <tr>

            {{-- KOLOM KIRI --}}
            <td style="width:50%; vertical-align:top;">
                <p><span class="label">Distansia Spinarum</span> : {{ $askeb->distansia_sinarum ?? '-' }} cm</p>
                <p><span class="label">Distansia Kristarum</span> : {{ $askeb->distansia_kristarum ?? '-' }} cm</p>
            </td>

            {{-- KOLOM KANAN --}}
            <td style="width:50%; vertical-align:top;">
                <p><span class="label">Konjugata Eksterna</span> : {{ $askeb->konjugata_eksterna ?? '-' }} cm</p>
                <p><span class="label">Lingkar Panggul</span> : {{ $askeb->lingkar_panggul ?? '-' }} cm</p>
            </td>

        </tr>
    </table>
    <hr>
    <h4 class="subsection">4. Pemeriksaan Penunjang / Laboratorium</h4>

    <div class="indent">

        <p>
            <span class="label">Tanggal</span> :
            {{ $askeb->lab_tanggal 
            ? \Carbon\Carbon::parse($askeb->lab_tanggal)->locale('id')->translatedFormat('d F Y') 
            : '-' }}
        </p>

        <p><span class="label">Tempat</span> : {{ $askeb->lab_tempat ?? '-' }}</p>

        <p><span class="label">Hasil</span> : {{ $askeb->lab_hasil ?? '-' }}</p>

    </div>

    <hr class="my-6">

    <h3 class="section">C. Analisa</h3>

    <div class="indent">

        <p><span class="label">1. Diagnosis</span> : {{ $askeb->diagnosis ?? '-' }}</p>

        <p><span class="label">2. Masalah Potensial</span> : {{ $askeb->masalah_potensial ?? '-' }}</p>

        <p><span class="label">3. Kebutuhan Segera</span> : {{ $askeb->kebutuhan_segera ?? '-' }}</p>

    </div>

    <hr class="my-6">

    <h3 class="section">D. Penatalaksanaan</h3>

    <div class="indent">

        <p>
            <span class="label">Jam</span> :
            {{ optional($askeb->penatalaksanaans->first())->jam ?? '-' }}
        </p>

        <p>
            <span class="label">Tanggal</span> :
            {{ optional($askeb->penatalaksanaans->first())->tanggal 
            ? \Carbon\Carbon::parse($askeb->penatalaksanaans->first()->tanggal)->locale('id')->translatedFormat('d F Y') 
            : '-' }}
        </p>

    </div>

    <br>

    <div class="indent">
        @forelse($askeb->penatalaksanaans as $item)
        <p>- {{ $item->tindakan }}</p>
        @empty
        <p>- Tidak ada penatalaksanaan</p>
        @endforelse
    </div>
    <div class="signature">

        Bojonegoro, {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}
        <br>
        Telah diperiksa dan disetujui Pembimbing Institusi

        <br>

        @php
    $path = public_path('images/acc.png');
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_exists($path) ? file_get_contents($path) : null;
    $base64 = $data ? 'data:image/' . $type . ';base64,' . base64_encode($data) : null;
@endphp

@if($base64)
    <img src="{{ $base64 }}" style="width:120px;">
@endif

        <br>

        ( {{ optional($askeb->dosen)->name ?? '-' }} )

    </div>

    </div>

<script type="text/php">
if (isset($pdf)) {
    $font = $fontMetrics->get_font("Times-Roman", "normal");
    $size = 9;

    // warna ungu (RGB)
    $color = array(107/255, 33/255, 168/255);

    // kiri
    $pdf->page_text(
        40, 800,
        "E-ASKEB KEHAMILAN PRODI KEBIDANAN - ISTeK ICsada Bojonegoro",
        $font, $size, $color
    );

    // kanan
    $pdf->page_text(
        500, 800,
        "Halaman {PAGE_NUM} / {PAGE_COUNT}",
        $font, $size, $color
    );
}
</script>

</body>

</html>