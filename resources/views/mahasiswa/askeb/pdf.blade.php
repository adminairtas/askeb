<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan ANC</title>

<style>

@page {
    size: A4;
    margin: 2.5cm;
}

body{
    font-family: "Times New Roman", serif;
    font-size: 12px;
    line-height: 1.6;
}

.judul{
    text-align:center;
    font-weight:bold;
}

.section{
    font-weight:bold;
    margin-top:20px;
}

.label{
    display:inline-block;
    width:170px;
}

table{
    width:100%;
    border-collapse:collapse;
    font-size:11px;
}

table th, table td{
    border:1px solid black;
    padding:4px;
    text-align:center;
}

.text-left{
    text-align:left;
}

.mt-10{
    margin-top:10px;
}

.mt-20{
    margin-top:20px;
}

</style>

</head>

<body>

<p><b>LAPORAN ANC : No …….</b></p>

<p>
<b>Asuhan Kebidanan Pada :</b><br>
{{ $askeb->asuhan_pada ?? '-' }}
</p>

<br>

<p>
<span class="label">Tanggal pengkajian</span> :
{{ $askeb->tanggal_pengkajian ?? '-' }}

&nbsp;&nbsp;&nbsp;

<span class="label">Pukul</span> :
{{ $askeb->pukul ?? '-' }} WIB
</p>

<p>
<span class="label">Tempat</span> :
{{ $askeb->tempat ?? '-' }}

&nbsp;&nbsp;&nbsp;

<span class="label">Oleh</span> :
{{ $askeb->mahasiswa->name ?? '-' }}
</p>


<div class="section">A. Data Subyektif</div>

<p><b>Biodata / Identitas</b></p>

<table style="border:none;">
<tr>
<td class="text-left" style="border:none;">
Nama Ibu : {{ $askeb->nama_ibu ?? '-' }} <br>
Umur : {{ $askeb->umur_ibu ?? '-' }} <br>
Suku/Bangsa : {{ $askeb->suku_ibu ?? '-' }} <br>
Agama : {{ $askeb->agama_ibu ?? '-' }} <br>
Pendidikan : {{ $askeb->pendidikan_ibu ?? '-' }} <br>
Pekerjaan : {{ $askeb->pekerjaan_ibu ?? '-' }} <br>
Penghasilan : {{ $askeb->penghasilan_ibu ?? '-' }}
</td>

<td class="text-left" style="border:none;">
Nama Suami : {{ $askeb->nama_suami ?? '-' }} <br>
Umur : {{ $askeb->umur_suami ?? '-' }} <br>
Suku/Bangsa : {{ $askeb->suku_suami ?? '-' }} <br>
Agama : {{ $askeb->agama_suami ?? '-' }} <br>
Pendidikan : {{ $askeb->pendidikan_suami ?? '-' }} <br>
Pekerjaan : {{ $askeb->pekerjaan_suami ?? '-' }} <br>
Penghasilan : {{ $askeb->penghasilan_suami ?? '-' }}
</td>
</tr>
</table>

<p class="mt-10">
Alamat : {{ $askeb->alamat ?? '-' }}
</p>

<p>
Keluhan Utama : {{ $askeb->keluhan_utama ?? '-' }}
</p>


<p class="section">Riwayat Menstruasi</p>

<p>
Menarche : {{ $askeb->menarche ?? '-' }} th
</p>

<p>
Siklus haid : {{ $askeb->siklus_haid ?? '-' }}
</p>

<p>
Lama : {{ $askeb->lama_haid ?? '-' }} hari
</p>

<p>
Jumlah : {{ $askeb->jumlah_haid ?? '-' }} cc
</p>

<p>
Karakteristik : {{ $askeb->karakteristik_haid ?? '-' }}
</p>


<p class="section">Riwayat Perkawinan</p>

<p>
Usia pertama menikah {{ $askeb->usia_pertama_menikah ?? '-' }} th,
lama menikah {{ $askeb->lama_menikah ?? '-' }} th,
status pernikahan {{ $askeb->status_pernikahan ?? '-' }}
</p>


<p class="section">Riwayat Obstetri</p>

<table>
<thead>
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

<tbody>

@foreach($askeb->obstetris as $i => $ob)

<tr>
<td>{{ $i+1 }}</td>
<td>{{ $ob->kehamilan ?? '-' }}</td>
<td>{{ $ob->jenis_persalinan ?? '-' }}</td>
<td>{{ $ob->penolong ?? '-' }}</td>
<td>{{ $ob->tempat_persalinan ?? '-' }}</td>
<td>{{ $ob->jk_bayi ?? '-' }}</td>
<td>{{ $ob->bb_pb ?? '-' }}</td>
<td>{{ $ob->umur_bayi ?? '-' }}</td>
<td>{{ $ob->keterangan_bayi ?? '-' }}</td>
<td>{{ $ob->laktasi ?? '-' }}</td>
<td>{{ $ob->penyulit_nifas ?? '-' }}</td>
</tr>

@endforeach

</tbody>
</table>


<p class="section">Riwayat Kontrasepsi</p>

<p>
Sebelum hamil ibu {{ $askeb->sebelum_hamil_ibu ?? '-' }}
</p>


<p class="section">Riwayat Kehamilan Sekarang</p>

<p>
HPHT :
{{ $askeb->hpht 
? \Carbon\Carbon::parse($askeb->hpht)->translatedFormat('d F Y')
: '-' }}

&nbsp;&nbsp;&nbsp;&nbsp;

HPL :
{{ $askeb->hpl 
? \Carbon\Carbon::parse($askeb->hpl)->translatedFormat('d F Y')
: '-' }}
</p>

<p>
Selama hamil ibu memeriksakan kehamilan {{ $askeb->jumlah_periksa ?? '-' }} kali,
status imunisasi {{ $askeb->status_imunisasi_tt ?? '-' }},
jumlah tablet MMS {{ $askeb->jumlah_mms ?? '-' }} butir,
gerak janin usia {{ $askeb->gerak_janin_usia ?? '-' }},
keluhan {{ $askeb->keluhan_hamil ?? '-' }},
obat yang didapat {{ $askeb->obat_didapat ?? '-' }}.
</p>


<p class="section">Riwayat Kesehatan Ibu</p>

<p>{{ $askeb->riwayat_kesehatan_ibu ?? '-' }}</p>


<p class="section">Riwayat Kesehatan Keluarga</p>

<p>{{ $askeb->riwayat_kesehatan_keluarga ?? '-' }}</p>


<div class="section">B. Data Obyektif</div>

<p>
Kesadaran : {{ $askeb->kesadaran ?? '-' }} <br>
Tekanan darah : {{ $askeb->tekanan_darah ?? '-' }} <br>
Denyut nadi : {{ $askeb->denyut_nadi ?? '-' }} <br>
Pernafasan : {{ $askeb->pernafasan ?? '-' }} <br>
Suhu : {{ $askeb->suhu ?? '-' }} <br>
LILA : {{ $askeb->lila ?? '-' }} <br>
BB/TB : {{ $askeb->berat_tinggi_badan ?? '-' }} <br>
BB sebelum hamil : {{ $askeb->berat_sebelum_hamil ?? '-' }}
</p>


<div class="section">C. Analisis Data</div>

<p>
Diagnosis : {{ $askeb->diagnosis ?? '-' }}
</p>

<p>
Masalah Potensial : {{ $askeb->masalah_potensial ?? '-' }}
</p>

<p>
Kebutuhan Segera : {{ $askeb->kebutuhan_segera ?? '-' }}
</p>


<div class="section">D. Penatalaksanaan</div>

<p>
Jam : {{ $askeb->jam_penatalaksanaan ?? '-' }}
</p>

<p>1. {{ $askeb->penatalaksanaan1 ?? '-' }}</p>
<p>2. {{ $askeb->penatalaksanaan2 ?? '-' }}</p>
<p>3. {{ $askeb->penatalaksanaandst ?? '-' }}</p>


<br><br><br>

<div style="width:100%;">

<div style="width:50%; float:right; text-align:center">

<p>Bojonegoro, .....................</p>

<p>Telah diperiksa dan disetujui</p>

<p>Pembimbing Institusi</p>

<br><br><br>

<p>( __________________ )</p>

</div>

</div>

</body>
</html>