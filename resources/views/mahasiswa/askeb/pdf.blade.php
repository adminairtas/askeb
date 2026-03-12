<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
            line-height: 1.4;
            text-align: justify;
        }

        /* Judul A B C D */
        .section {
            font-weight: bold;
            color: #6b21a8;
            font-size: 14px;
            margin-top: 12px;
            margin-bottom: 4px;
        }

        /* Judul nomor */
        .subsection {
            font-weight: bold;
            font-size: 13px;
            margin-top: 6px;
            margin-bottom: 2px;
        }

        /* paragraf */
        p {
            margin: 2px 0;
        }

        /* list penomoran */
        ol {
            margin: 4px 0 4px 18px;
            padding: 0;
        }

        li {
            margin: 2px 0;
            padding: 0;
        }

        /* tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 2px 4px;
            vertical-align: top;
        }

        /* garis */
        hr {
            margin: 6px 0;
        }

        /* paragraf */
        .paragraph {
            text-align: justify;
            margin-bottom: 8px;
        }

        /* tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        table,
        th,
        td {
            border: none;
        }

        th {
            font-weight: bold;
            text-align: center;
            background: #f3f3f3;
        }

        th,
        td {
            padding: 5px;
            font-size: 11px;
        }

        /* list penatalaksanaan */
        ol {
            margin-left: 20px;
        }

        li {
            margin-bottom: 4px;
        }

        /* tanda tangan */
        .ttd {
            width: 100%;
            text-align: right;
            margin-top: 40px;
        }

        /* garis pemisah */
        hr {
            margin: 15px 0;
            border: 0.5px solid #999;
        }

        /* margin halaman */
        @page {
            margin-top: 0.59in;
            margin-left: 0.91in;
            margin-bottom: 0.59in;
            margin-right: 0.71in;
        }

        .signature {
            width: 100%;
            text-align: right;
            margin-top: 60px;
            page-break-inside: avoid;
        }

        .signature img {
            width: 120px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>

</head>

<body>

    <div class="paragraph"><B>LAPORAN ANC : No..........</B></div>

    <table>
        <tr>
            <td><b>Asuhan Kebidanan Pada : </b>{{ $askeb->asuhan_pada ?? '-' }}</td>
        </tr>
    </table>


    <table>
        <tr>
            <td width="25%">Tanggal pengkajian</td>
            <td width="25%">: {{ optional($askeb->tanggal_pengkajian)->format('Y-m-d') ?? '-' }}</td>

            <td width="15%">Pukul</td>
            <td>: {{ optional($askeb->pukul)->format('H:i') ?? '-' }} WIB</td>
        </tr>

        <tr>
            <td>Tempat</td>
            <td>: {{ $askeb->tempat ?? '-' }}</td>

            <td>Oleh</td>
            <td>: {{ $askeb->mahasiswa->name ?? '-' }}</td>
        </tr>
    </table>

    <hr class="my-6">

    <h3 class="section">A. Data Subyektif</h3>
    <h4 class="subsection">1. Biodata / Identitas</h4>

    <table>

        <tr>
            <td class="label">Nama Ibu</td>
            <td>: {{ $askeb->nama_ibu ?? '-' }}</td>

            <td class="label">Nama Suami</td>
            <td>: {{ $askeb->nama_suami ?? '-' }}</td>
        </tr>

        <tr>
            <td>Umur</td>
            <td>: {{ $askeb->umur_ibu ?? '-' }}</td>

            <td>Umur</td>
            <td>: {{ $askeb->umur_suami ?? '-' }}</td>
        </tr>

        <tr>
            <td>Suku / Bangsa</td>
            <td>: {{ $askeb->suku_ibu ?? '-' }}</td>

            <td>Suku / Bangsa</td>
            <td>: {{ $askeb->suku_suami ?? '-' }}</td>
        </tr>

        <tr>
            <td>Agama</td>
            <td>: {{ $askeb->agama_ibu ?? '-' }}</td>

            <td>Agama</td>
            <td>: {{ $askeb->agama_suami ?? '-' }}</td>
        </tr>

        <tr>
            <td>Pendidikan</td>
            <td>: {{ $askeb->pendidikan_ibu ?? '-' }}</td>

            <td>Pendidikan</td>
            <td>: {{ $askeb->pendidikan_suami ?? '-' }}</td>
        </tr>

        <tr>
            <td>Pekerjaan</td>
            <td>: {{ $askeb->pekerjaan_ibu ?? '-' }}</td>

            <td>Pekerjaan</td>
            <td>: {{ $askeb->pekerjaan_suami ?? '-' }}</td>
        </tr>

        <tr>
            <td>Penghasilan</td>
            <td>: {{ $askeb->penghasilan_ibu ?? '-' }}</td>

            <td>Penghasilan</td>
            <td>: {{ $askeb->penghasilan_suami ?? '-' }}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td colspan="3">: {{ $askeb->alamat ?? '-' }}</td>
        </tr>

    </table>

    <br>

    <h4 class="subsection">2. Keluhan Utama</h4>

    {{ $askeb->keluhan_utama ?? '-' }}

    <br><br>

    <h4 class="subsection">3. Riwayat Menstruasi</h4>

    <table>

        <tr>
            <td width="30%">Menarche</td>
            <td width="2%">:</td>
            <td>{{ $askeb->menarche ?? '-' }} th</td>
        </tr>

        <tr>
            <td width="30%">Siklus Haid</td>
            <td width="2%">:</td>
            <td>{{ $askeb->siklus_haid ?? '-' }}</td>
        </tr>

        <tr>
            <td width="30%">Lama</td>
            <td width="2%">:</td>
            <td>{{ $askeb->lama_haid ?? '-' }} hari</td>
        </tr>

        <tr>
            <td width="30%">Jumlah</td>
            <td width="2%">:</td>
            <td>{{ $askeb->jumlah_haid ?? '-' }} cc</td>
        </tr>

        <tr>
            <td width="30%">Karakteristik</td>
            <td width="2%">:</td>
            <td>{{ $askeb->karakteristik_haid ?? '-' }}</td>
        </tr>

    </table>

    <br>

    <h4 class="subsection">4. Riwayat Perkawinan</h4>

    Usia pertama menikah {{ $askeb->usia_pertama_menikah ?? '-' }} th,
    lama {{ $askeb->lama_menikah ?? '-' }} th,
    status pernikahan {{ $askeb->status_pernikahan ?? '-' }}

    <br><br>

    <h4 class="subsection">5. Riwayat Obstetri</h4>

    <table border="1">

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

        @foreach($askeb->obstetris as $i => $o)

        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $o->kehamilan }}</td>
            <td>{{ $o->jenis_persalinan }}</td>
            <td>{{ $o->penolong }}</td>
            <td>{{ $o->tempat_persalinan }}</td>
            <td>{{ $o->jk_bayi }}</td>
            <td>{{ $o->bb_pb }}</td>
            <td>{{ $o->umur_bayi }}</td>
            <td>{{ $o->keterangan_bayi }}</td>
            <td>{{ $o->laktasi }}</td>
            <td>{{ $o->penyulit_nifas }}</td>
        </tr>

        @endforeach

    </table>

    <br>
    <h4 class="subsection">6. Riwayat Kontrasepsi :</h4>
    <p class="paragraph">
        Selama hamil ibu :
        {{ $askeb->sebelum_hamil_ibu ?? '-' }}
    </p>

    <br>

    <h4 class="subsection">7. Riwayat Kehamilan Sekarang</h4>

    <table>
        <tr>
            <td width="10%">HPHT</td>
            <td width="2%">:</td>
            <td width="38%">{{ $askeb->hpht ?? '-' }}</td>

            <td width="10%">HPL</td>
            <td width="2%">:</td>
            <td width="38%">{{ $askeb->hpl ?? '-' }}</td>
        </tr>
    </table>

    <div class="paragraph">
        Selama hamil ibu memeriksakan kehamilan
        {{ $askeb->jumlah_periksa ?? '-' }} kali,
        status imunisasi (imunisasi TT)
        {{ $askeb->status_imunisasi_tt ?? '-' }},
        jumlah tablet MMS yang telah diminum
        {{ $askeb->jumlah_mms ?? '-' }} butir,
        merasakan gerak janin usia
        {{ $askeb->gerak_janin_usia ?? '-' }} minggu/bulan,
        keluhan yang pernah dirasakan selama kehamilan sebelumnya
        {{ $askeb->keluhan_hamil ?? '-' }}
        dan obat yang didapat oleh ibu
        {{ $askeb->obat_didapat ?? '-' }}.
    </div>

    <br>

    <h4 class="subsection">8. Riwayat Kesehatan Ibu :</h4>

    <div class="paragraph">
        {{ $askeb->riwayat_kesehatan_ibu ?? '-' }}
    </div>

    <br>

    <h4 class="subsection">9. Riwayat Kesehatan Keluarga :</h4>

    <div class="paragraph">
        {{ $askeb->riwayat_kesehatan_keluarga ?? '-' }}
    </div>

    <br>

    <h4 class="subsection">10. Pola Fungsional Kesehatan</h4>

    <table>

        <tr>
            <td width="25%">A. Pola nutrisi</td>
            <td width="2%">:</td>
            <td>{{ $askeb->pola_nutrisi ?? '-' }}</td>
        </tr>

        <tr>
            <td width="25%">B. Pola Eliminasi</td>
        </tr>
        <tr>
            <td>- BAK</td>
            <td>:</td>
            <td>
                {{ $askeb->bak_frekuensi ?? '-' }} x/hari,
                konsistensi {{ $askeb->bak_konsistensi ?? '-' }}
            </td>
        </tr>

        <tr>
            <td>- BAB</td>
            <td>:</td>
            <td>
                {{ $askeb->bab_frekuensi ?? '-' }} x/hari,
                konsistensi {{ $askeb->bab_konsistensi ?? '-' }}
            </td>
        </tr>

        <tr>
            <td>C. Pola istirahat</td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>- Tidur siang</td>
            <td>:</td>
            <td>
                {{ $askeb->tidur_siang ?? '-' }} jam/hari
            </td>
        </tr>

        <tr>
            <td>- Tidur malam</td>
            <td>:</td>
            <td>
                {{ $askeb->tidur_malam ?? '-' }} jam/hari
            </td>
        </tr>

        <tr>
            <td>D. Pola aktivitas</td>
            <td>:</td>
            <td>{{ $askeb->pola_aktivitas ?? '-' }}</td>
        </tr>

        <tr>
            <td>E. Personal hygiene</td>
            <td>:</td>
            <td>
                Ibu mandi {{ $askeb->mandi ?? '-' }} kali/hari,
                gosok gigi {{ $askeb->gosok_gigi ?? '-' }} kali/hari,
                keramas {{ $askeb->keramas ?? '-' }} kali/minggu,
                ganti baju {{ $askeb->ganti_baju ?? '-' }} kali/hari,
                ganti celana dalam {{ $askeb->ganti_cd ?? '-' }} kali/hari
            </td>
        </tr>

        <tr>
            <td>F. Aktivitas seksual</td>
            <td>:</td>
            <td>Selama hamil ibu {{ $askeb->aktivitas_seksual ?? '-' }}</td>
        </tr>

        <tr>
            <td>G. Pola kebiasaan</td>
            <td>:</td>
            <td>{{ $askeb->pola_kebiasaan ?? '-' }}</td>
        </tr>

    </table>

    <br>

    <h4 class="subsection">11. Riwayat Sosial Budaya, Pengetahuan dan Spiritual</h4>

    <div class="paragraph">
        <table>

        <tr>
            <td width="25%">Kehamilan Ini</td>
            <td width="2%">:</td>
            <td>{{ $askeb->kehamilan_ini ?? '-' }}</td>
        </tr>

        <tr>
            <td width="25%"></td>Kondisi Ibu</td>
            <td width="2%">:</td>
            <td>{{ $askeb->kondisi_ibu_kehamilan ?? '-' }}</td>
        </tr>

        <tr>
            <td width="25%">Tradisi</td>
            <td width="2%">:</td>
            <td>{{ $askeb->tradisi ?? '-' }}</td>
        </tr>

        <tr>
            <td width="25%">Spiritual</td>
            <td width="2%">:</td>
            <td>{{ $askeb->spiritual ?? '-' }}</td>
        </tr>

                <tr>
            <td width="25%">Pengetahuan</td>
            <td width="2%">:</td>
            <td>{{ $askeb->pengetahuan ?? '-' }}</td>
        </tr>
</table>

    </div>

    <br>
    <hr class="my-6">

    <h3 class="section">B. Data Obyektif</h3>

    <h4 class="subsection">1. Pemeriksaan Umum :</h4>

    <table>

        <tr>
            <td width="25%">A. Kesadaran</td>
            <td width="2%">:</td>
            <td width="23%">{{ $askeb->kesadaran ?? '-' }}</td>

            <td width="25%">E. Suhu</td>
            <td width="2%">:</td>
            <td width="23%">
                {{ $askeb->suhu ?? '-' }} °C
            </td>
        </tr>

        <tr>
            <td>B. Tekanan Darah</td>
            <td>:</td>
            <td>
                {{ $askeb->tekanan_darah ?? '-' }} mmHg
            </td>

            <td>F. LILA</td>
            <td>:</td>
            <td>
                {{ $askeb->lila ?? '-' }} cm
            </td>
        </tr>

        <tr>
            <td>C. Denyut Nadi</td>
            <td>:</td>
            <td>
                {{ $askeb->denyut_nadi ?? '-' }} X/Menit
            </td>

            <td>G. Berat / Tinggi Badan</td>
            <td>:</td>
            <td>
                {{ $askeb->berat_tinggi_badan ?? '-' }} kg
            </td>
        </tr>

        <tr>
            <td>D. Pernafasan</td>
            <td>:</td>
            <td>
                {{ $askeb->pernafasan ?? '-' }} X/Menit
            </td>

            <td>H. BB Sebelum Hamil</td>
            <td>:</td>
            <td>
                {{ $askeb->berat_sebelum_hamil ?? '-' }} kg
            </td>
        </tr>

    </table>

    <h4 class="subsection">2. Pemeriksaan Fisik</h4>

    <table>

        <tr>
            <td width="25%">a. Kepala</td>
            <td width="2%">:</td>
            <td>{{ $askeb->kepala ?? '-' }}</td>
        </tr>

        <tr>
            <td>b. Muka</td>
            <td>:</td>
            <td>{{ $askeb->muka ?? '-' }}</td>
        </tr>

        <tr>
            <td>c. Mata</td>
            <td>:</td>
            <td>{{ $askeb->mata ?? '-' }}</td>
        </tr>

        <tr>
            <td>d. Hidung</td>
            <td>:</td>
            <td>{{ $askeb->hidung ?? '-' }}</td>
        </tr>

        <tr>
            <td>e. Mulut</td>
            <td>:</td>
            <td>{{ $askeb->mulut ?? '-' }}</td>
        </tr>

        <tr>
            <td>f. Leher</td>
            <td>:</td>
            <td>{{ $askeb->leher ?? '-' }}</td>
        </tr>

        <tr>
            <td>g. Dada</td>
            <td>:</td>
            <td>{{ $askeb->dada ?? '-' }}</td>
        </tr>

        <tr>
            <td>h. Abdomen</td>
            <td>:</td>
            <td>{{ $askeb->abdomen ?? '-' }}</td>
        </tr>

        <tr>
            <td>- Leopold I</td>
            <td>:</td>
            <td>{{ $askeb->leopold_i ?? '-' }}</td>
        </tr>

        <tr>
            <td>- Leopold II</td>
            <td>:</td>
            <td>{{ $askeb->leopold_ii ?? '-' }}</td>
        </tr>

        <tr>
            <td>- Leopold III</td>
            <td>:</td>
            <td>{{ $askeb->leopold_iii ?? '-' }}</td>
        </tr>

        <tr>
            <td>- Leopold IV</td>
            <td>:</td>
            <td>{{ $askeb->leopold_iv ?? '-' }}</td>
        </tr>

        <tr>
            <td>- TBJ</td>
            <td>:</td>
            <td>{{ $askeb->tbj ?? '-' }} gram</td>
        </tr>

        <tr>
            <td>- DJJ</td>
            <td>:</td>
            <td>{{ $askeb->djj ?? '-' }} X/Menit</td>
        </tr>

        <tr>
            <td>i. Genetalia</td>
            <td>:</td>
            <td>{{ $askeb->gentelia ?? '-' }}</td>
        </tr>

        <tr>
            <td>j. Anus</td>
            <td>:</td>
            <td>{{ $askeb->anus ?? '-' }}</td>
        </tr>

        <tr>
            <td>k. Ekstremitas</td>
            <td>:</td>
            <td>{{ $askeb->ekstremitas ?? '-' }}</td>
        </tr>

    </table>

    <br>

    <h4 class="subsection">3. Pemeriksaan Panggul Luar</h4>

    <table>

        <tr>
            <td width="25%">Distansia Spinarum</td>
            <td width="2%">:</td>
            <td>
                {{ $askeb->distansia_sinarum ?? '-' }} cm
            </td>

            <td width="25%">Konjugata Eksterna</td>
            <td width="2%">:</td>
            <td>
                {{ $askeb->konjugata_eksterna ?? '-' }} cm
            </td>
        </tr>

        <tr>
            <td>Distansia Kristarum</td>
            <td>:</td>
            <td>
                {{ $askeb->distansia_kristarum ?? '-' }} cm
            </td>

            <td>Lingkar Panggul</td>
            <td>:</td>
            <td>
                {{ $askeb->lingkar_panggul ?? '-' }} cm
            </td>
        </tr>

    </table>

    <h4 class="subsection">4. Pemeriksaan Penunjang / Laboratorium</h4>

    <table>

        <tr>
            <td width="25%">Tanggal</td>
            <td width="2%">:</td>
            <td>{{ $askeb->lab_tanggal ?? '-' }}</td>
        </tr>

        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td>{{ $askeb->lab_tempat ?? '-' }}</td>
        </tr>

        <tr>
            <td>Hasil</td>
            <td>:</td>
            <td>{{ $askeb->lab_hasil ?? '-' }}</td>
        </tr>

    </table>

    <br>
    <hr class="my-6">

    <h3 class="section">C. Analisa</h3>

    <table>

        <tr>
            <td width="25%">1. Diagnosis</td>
            <td width="2%">:</td>
            <td>{{ $askeb->diagnosis ?? '-' }}</td>
        </tr>

        <tr>
            <td>2. Masalah Potensial</td>
            <td>:</td>
            <td>{{ $askeb->masalah_potensial ?? '-' }}</td>
        </tr>

        <tr>
            <td>3. Kebutuhan Segera</td>
            <td>:</td>
            <td>{{ $askeb->kebutuhan_segera ?? '-' }}</td>
        </tr>

    </table>

    <br>
    <hr class="my-6">

    <h3 class="section">D. Penatalaksanaan</h3>
    <p>
        Jam : {{ optional($askeb->penatalaksanaans->first())->jam ?? '-' }}
    </p>

    <p>
        Tanggal : {{ optional($askeb->penatalaksanaans->first())->tanggal ?? '-' }}
    </p>
    <ol>
        @foreach($askeb->penatalaksanaans as $item)
        <li>{{ $item->tindakan }}</li>
        @endforeach
    </ol>

    <div class="signature">

        Bojonegoro, {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}
        <br>
        Telah diperiksa dan disetujui Pembimbing Institusi

        <br>

        <img src="{{ public_path('images/acc.png') }}">

        <br>

        ( {{ optional($askeb->dosen)->name ?? '-' }} )

    </div>

    </div>

</body>

</html>