<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('askebs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('mahasiswa_id')->constrained('users')->cascadeOnDelete();
        $table->foreignId('dosen_id')->constrained('users')->cascadeOnDelete();
        $table->string('status')->default('review');

        // HEADER
        $table->text('asuhan_pada')->nullable();
        $table->date('tanggal_pengkajian')->nullable();
        $table->time('pukul')->nullable();
        $table->string('tempat')->nullable();

        // BIODATA IBU
        $table->string('nama_ibu')->nullable();
        $table->string('umur_ibu')->nullable();
        $table->string('suku_ibu')->nullable();
        $table->string('agama_ibu')->nullable();
        $table->string('pendidikan_ibu')->nullable();
        $table->string('pekerjaan_ibu')->nullable();
        $table->string('penghasilan_ibu')->nullable();

        // BIODATA SUAMI
        $table->string('nama_suami')->nullable();
        $table->string('umur_suami')->nullable();
        $table->string('suku_suami')->nullable();
        $table->string('agama_suami')->nullable();
        $table->string('pendidikan_suami')->nullable();
        $table->string('pekerjaan_suami')->nullable();
        $table->string('penghasilan_suami')->nullable();

        $table->text('alamat')->nullable();
        $table->text('keluhan_utama')->nullable();

        // MENSTRUASI
        $table->string('menarche')->nullable();
        $table->string('lama_haid')->nullable();
        $table->string('jumlah_haid')->nullable();
        $table->string('karakteristik_haid')->nullable();
        $table->string('siklus_haid')->nullable();

        // PERKAWINAN
        $table->string('usia_pertama_menikah')->nullable();
        $table->string('lama_menikah')->nullable();
        $table->string('status_pernikahan')->nullable();

        // KONTRASEPSI
        $table->text('sebelum_hamil_ibu')->nullable();

        // KEHAMILAN SEKARANG
        $table->date('hpht')->nullable();
        $table->date('hpl')->nullable();
        $table->string('jumlah_periksa')->nullable();
        $table->text('keluhan_hamil')->nullable();

        // RIWAYAT KESEHATAN
        $table->text('riwayat_kesehatan_ibu')->nullable();
        $table->text('riwayat_kesehatan_keluarga')->nullable();
        $table->text('pola_fungsional_kesehatan')->nullable();

        // SOSIAL BUDAYA
        $table->string('kehamilan_ini')->nullable();
        $table->string('kondisi_ibu_kehamilan')->nullable();
        $table->string('tradisi')->nullable();
        $table->string('spiritual')->nullable();
        $table->string('pengetahuan')->nullable();

        // PEMERIKSAAN UMUM
        $table->string('kesadaran')->nullable();
        $table->string('tekanan_darah')->nullable();
        $table->string('denyut_nadi')->nullable();
        $table->string('pernafasan')->nullable();
        $table->string('suhu')->nullable();
        $table->string('lila')->nullable();
        $table->string('berat_tinggi_badan')->nullable();
        $table->string('berat_sebelum_hamil')->nullable();

        // FISIK
        $table->text('kepala')->nullable();
        $table->text('muka')->nullable();
        $table->text('mata')->nullable();
        $table->text('hidung')->nullable();
        $table->text('mulut')->nullable();
        $table->text('leher')->nullable();
        $table->text('dada')->nullable();
        $table->text('abdomen')->nullable();
        $table->string('leopold_i')->nullable();
        $table->string('leopold_ii')->nullable();
        $table->string('leopold_iii')->nullable();
        $table->string('leopold_iv')->nullable();
        $table->string('tbj')->nullable();
        $table->string('djj')->nullable();
        $table->text('genetalia')->nullable();
        $table->text('anus')->nullable();
        $table->text('ekstemitas')->nullable();

        // PANGGUL
        $table->string('distansia_sinarum')->nullable();
        $table->string('distansia_kristarum')->nullable();
        $table->string('konjugata_eksterna')->nullable();
        $table->string('lingkar_panggul')->nullable();

        // ANALISIS
        $table->text('diagnosis')->nullable();
        $table->text('masalah_potensial')->nullable();
        $table->text('kebutuhan_segera')->nullable();

        // PENATALAKSANAAN
        $table->time('jam_penatalaksanaan')->nullable();
        $table->string('penatalaksanaan1')->nullable();
        $table->string('penatalaksanaan2')->nullable();
        $table->string('penatalaksanaandst')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
