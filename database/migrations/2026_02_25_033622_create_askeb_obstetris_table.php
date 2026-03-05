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
    Schema::create('askeb_obstetris', function (Blueprint $table) {
        $table->id();
        $table->foreignId('askeb_id')->constrained()->cascadeOnDelete();

        $table->string('kehamilan')->nullable();
        $table->string('jenis_persalinan')->nullable();
        $table->string('penolong')->nullable();
        $table->string('tempat_persalinan')->nullable();
        $table->string('jk_bayi')->nullable();
        $table->string('bb_pb')->nullable();
        $table->string('umur_bayi')->nullable();
        $table->string('keterangan_bayi')->nullable();
        $table->string('laktasi')->nullable();
        $table->string('penyulit_nifas')->nullable();

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('askeb_obstetris');
    }
};
