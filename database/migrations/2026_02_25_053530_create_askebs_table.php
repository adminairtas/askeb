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
        $table->foreignId('mahasiswa_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
        $table->text('isi');
        $table->text('catatan_dosen')->nullable();
        $table->enum('status', ['draft','review','revisi','acc'])->default('draft');
        $table->string('kode_validasi')->nullable();
        $table->timestamp('acc_at')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('askebs');
    }
};
