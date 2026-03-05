<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>

@page{
    size:A4;
    margin:2cm;
}

body{
    font-family:"Times New Roman", serif;
    font-size:12px;
    line-height:1.5;
}

.title{
    text-align:right;
    font-weight:bold;
}

.section{
    margin-top:10px;
    font-weight:bold;
}

table{
    width:100%;
}

td{
    padding:2px;
    vertical-align:top;
}

.table-border{
    border-collapse:collapse;
}

.table-border td,
.table-border th{
    border:1px solid black;
    padding:4px;
}

</style>
</head>

<body>

{{-- ===================== --}}
{{-- HALAMAN 1 --}}
{{-- ===================== --}}

<div class="title">
LAPORAN ANC : No {{ $askeb->id }}
</div>

<br>

<b>Asuhan Kebidanan Pada :</b> {{ $askeb->nama_pasien }}

<br><br>

<table>
<tr>
<td width="25%">Tanggal pengkajian</td>
<td>: {{ $askeb->tanggal_pengkajian }}</td>

<td width="10%">Pukul</td>
<td>: {{ $askeb->pukul }} WIB</td>
</tr>

<tr>
<td>Tempat</td>
<td>: {{ $askeb->tempat }}</td>

<td>Oleh</td>
<td>: {{ $askeb->mahasiswa->name }}</td>
</tr>
</table>

<div class="section">A. DATA SUBYEKTIF</div>

<b>1. Biodata / Identitas</b>

<table>

<tr>
<td width="20%">Nama Ibu</td>
<td>: {{ $askeb->nama_ibu }}</td>

<td width="20%">Nama Suami</td>
<td>: {{ $askeb->nama_suami }}</td>
</tr>

<tr>
<td>Umur</td>
<td>: {{ $askeb->umur_ibu }}</td>

<td>Umur</td>
<td>: {{ $askeb->umur_suami }}</td>
</tr>

<tr>
<td>Suku/Bangsa</td>
<td>: {{ $askeb->suku_ibu }}</td>

<td>Suku/Bangsa</td>
<td>: {{ $askeb->suku_suami }}</td>
</tr>

<tr>
<td>Agama</td>
<td>: {{ $askeb->agama_ibu }}</td>

<td>Agama</td>
<td>: {{ $askeb->agama_suami }}</td>
</tr>

<tr>
<td>Pendidikan</td>
<td>: {{ $askeb->pendidikan_ibu }}</td>

<td>Pendidikan</td>
<td>: {{ $askeb->pendidikan_suami }}</td>
</tr>

<tr>
<td>Pekerjaan</td>
<td>: {{ $askeb->pekerjaan_ibu }}</td>

<td>Pekerjaan</td>
<td>: {{ $askeb->pekerjaan_suami }}</td>
</tr>

<tr>
<td>Alamat</td>
<td colspan="3">: {{ $askeb->alamat }}</td>
</tr>

</table>

<br>

<b>Keluhan Utama</b><br>
{{ $askeb->keluhan }}

<br><br>

<b>Riwayat Menstruasi</b>

<table>
<tr>
<td width="25%">Menarche</td>
<td>: {{ $askeb->menarche }} tahun</td>
</tr>

<tr>
<td>Siklus haid</td>
<td>: {{ $askeb->siklus }}</td>
</tr>

<tr>
<td>Lama</td>
<td>: {{ $askeb->lama_haid }} hari</td>
</tr>

<tr>
<td>Jumlah</td>
<td>: {{ $askeb->jumlah_haid }} cc</td>
</tr>
</table>

<br>

<b>Riwayat Perkawinan</b><br>

Usia pertama menikah : {{ $askeb->usia_pertama_menikah }} tahun<br>
Lama menikah : {{ $askeb->lama_menikah }} tahun<br>
Status pernikahan : {{ $askeb->status_pernikahan }}

<br><br>

<b>Riwayat Obstetri</b>

<table class="table-border">

<tr>
<th>No</th>
<th>Kehamilan</th>
<th>Jenis</th>
<th>Penolong</th>
<th>Tempat</th>
<th>JK</th>
<th>BB/PB</th>
<th>Umur</th>
<th>Keterangan</th>
<th>Laktasi</th>
<th>Penyulit</th>
</tr>

@foreach($askeb->obstetris as $o)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $o->kehamilan }}</td>
<td>{{ $o->jenis }}</td>
<td>{{ $o->penolong }}</td>
<td>{{ $o->tempat }}</td>
<td>{{ $o->jk }}</td>
<td>{{ $o->bb_pb }}</td>
<td>{{ $o->umur }}</td>
<td>{{ $o->ket }}</td>
<td>{{ $o->laktasi }}</td>
<td>{{ $o->penyulit }}</td>
</tr>
@endforeach

</table>


<div style="page-break-before: always;"></div>


{{-- ===================== --}}
{{-- HALAMAN 2 --}}
{{-- ===================== --}}

<div class="section">B. DATA OBYEKTIF</div>

<b>Pemeriksaan Umum</b>

<table>

<tr>
<td width="25%">Kesadaran</td>
<td>: {{ $askeb->kesadaran }}</td>
</tr>

<tr>
<td>Tekanan darah</td>
<td>: {{ $askeb->tekanan_darah }}</td>
</tr>

<tr>
<td>Nadi</td>
<td>: {{ $askeb->nadi }}</td>
</tr>

<tr>
<td>Suhu</td>
<td>: {{ $askeb->suhu }}</td>
</tr>

<tr>
<td>Pernafasan</td>
<td>: {{ $askeb->pernafasan }}</td>
</tr>

<tr>
<td>LILA</td>
<td>: {{ $askeb->lila }}</td>
</tr>

<tr>
<td>BB / TB</td>
<td>: {{ $askeb->bb_tb }}</td>
</tr>

</table>

<br>

<b>Pemeriksaan Fisik</b>

<table>

<tr>
<td width="25%">Kepala</td>
<td>: {{ $askeb->kepala }}</td>
</tr>

<tr>
<td>Muka</td>
<td>: {{ $askeb->muka }}</td>
</tr>

<tr>
<td>Mata</td>
<td>: {{ $askeb->mata }}</td>
</tr>

<tr>
<td>Hidung</td>
<td>: {{ $askeb->hidung }}</td>
</tr>

<tr>
<td>Mulut</td>
<td>: {{ $askeb->mulut }}</td>
</tr>

<tr>
<td>Leher</td>
<td>: {{ $askeb->leher }}</td>
</tr>

<tr>
<td>Dada</td>
<td>: {{ $askeb->dada }}</td>
</tr>

<tr>
<td>Abdomen</td>
<td>: {{ $askeb->abdomen }}</td>
</tr>

</table>


<div style="page-break-before: always;"></div>


{{-- ===================== --}}
{{-- HALAMAN 3 --}}
{{-- ===================== --}}

<b>Pemeriksaan Leopold</b>

<table>

<tr>
<td width="25%">Leopold I</td>
<td>: {{ $askeb->leopold1 }}</td>
</tr>

<tr>
<td>Leopold II</td>
<td>: {{ $askeb->leopold2 }}</td>
</tr>

<tr>
<td>Leopold III</td>
<td>: {{ $askeb->leopold3 }}</td>
</tr>

<tr>
<td>Leopold IV</td>
<td>: {{ $askeb->leopold4 }}</td>
</tr>

<tr>
<td>TBJ</td>
<td>: {{ $askeb->tbj }}</td>
</tr>

<tr>
<td>DJJ</td>
<td>: {{ $askeb->djj }}</td>
</tr>

</table>

<br>

<b>Pemeriksaan Laboratorium</b>

Tanggal : {{ $askeb->tanggal_lab }}<br>
Tempat : {{ $askeb->tempat_lab }}<br>
Hasil : {{ $askeb->hasil_lab }}


<div style="page-break-before: always;"></div>


{{-- ===================== --}}
{{-- HALAMAN 4 --}}
{{-- ===================== --}}

<div class="section">C. ANALISIS DATA</div>

Diagnosis : {{ $askeb->diagnosis }}

<br><br>

Masalah Potensial : {{ $askeb->masalah_potensial }}

<br><br>

Kebutuhan Segera : {{ $askeb->kebutuhan_segera }}

<br><br>

<div class="section">D. PENATALAKSANAAN</div>

Jam : {{ $askeb->jam_penatalaksanaan }}

<br>

{{ $askeb->penatalaksanaan }}

<br><br><br>

<table>
<tr>
<td width="60%"></td>
<td align="center">

Bojonegoro, {{ date('d-m-Y') }}

<br><br>

Pembimbing Institusi

<br><br><br><br>

({{ $askeb->dosen->name }})

</td>
</tr>
</table>

</body>
</html>