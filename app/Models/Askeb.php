<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Askeb extends Model
{
    protected $fillable = [

        'mahasiswa_id',
        'dosen_id',
        'status',
        'kode_validasi',
        'acc_at',

        // HEADER
        'asuhan_pada',
        'tanggal_pengkajian',
        'pukul',
        'tempat',

        // BIODATA IBU
        'nama_ibu',
        'umur_ibu',
        'suku_ibu',
        'agama_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',

        // BIODATA SUAMI
        'nama_suami',
        'umur_suami',
        'suku_suami',
        'agama_suami',
        'pendidikan_suami',
        'pekerjaan_suami',
        'penghasilan_suami',

        'alamat',
        'keluhan_utama',

        // MENSTRUASI
        'menarche',
        'lama_haid',
        'jumlah_haid',
        'karakteristik_haid',
        'siklus_haid',

        // PERKAWINAN
        'usia_pertama_menikah',
        'lama_menikah',
        'status_pernikahan',

        // KONTRASEPSI
        'sebelum_hamil_ibu',

        // KEHAMILAN
        'hpht',
        'hpl',
        'jumlah_periksa',
        'status_imunisasi_tt',
        'jumlah_mms',
        'gerak_janin_usia',
        'keluhan_hamil',
        'obat_didapat',

        // KESEHATAN
        'riwayat_kesehatan_ibu',
        'riwayat_kesehatan_keluarga',
        'pola_fungsional_kesehatan',

        // SOSIAL
        'kehamilan_ini',
        'kondisi_ibu_kehamilan',
        'tradisi',
        'spiritual',
        'pengetahuan',

        // PEMERIKSAAN UMUM
        'kesadaran',
        'tekanan_darah',
        'denyut_nadi',
        'pernafasan',
        'suhu',
        'lila',
        'berat_tinggi_badan',
        'berat_sebelum_hamil',

        // FISIK
        'kepala',
        'muka',
        'mata',
        'hidung',
        'mulut',
        'leher',
        'dada',
        'abdomen',
        'leopold_i',
        'leopold_ii',
        'leopold_iii',
        'leopold_iv',
        'tbj',
        'djj',
        'genetalia',
        'anus',
        'ekstemitas',

        // PANGGUL
        'distansia_sinarum',
        'distansia_kristarum',
        'konjugata_eksterna',
        'lingkar_panggul',

        // ANALISIS
        'diagnosis',
        'masalah_potensial',
        'kebutuhan_segera',

        // PENATALAKSANAAN
        'jam_penatalaksanaan',
        'penatalaksanaan1',
        'penatalaksanaan2',
        'penatalaksanaandst',
    ];

    protected $casts = [
        'tanggal_pengkajian' => 'date',
        'hpht' => 'date',
        'hpl' => 'date',
        'pukul' => 'datetime:H:i',
        'jam_penatalaksanaan' => 'datetime:H:i',
        'acc_at' => 'datetime',
    ];

    public function obstetris()
    {
        return $this->hasMany(AskebObstetri::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(\App\Models\User::class, 'mahasiswa_id');
    }

    public function dosen()
    {
        return $this->belongsTo(\App\Models\User::class, 'dosen_id');
    }

    public function revisis()
    {
        return $this->hasMany(\App\Models\AskebRevisi::class);
    }

    
}