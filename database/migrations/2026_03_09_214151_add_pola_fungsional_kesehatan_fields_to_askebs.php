<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('askebs', function (Blueprint $table) {

            $table->text('pola_nutrisi')->nullable();

            $table->integer('bak_frekuensi')->nullable();
            $table->string('bak_konsistensi')->nullable();

            $table->integer('bab_frekuensi')->nullable();
            $table->string('bab_konsistensi')->nullable();

            $table->integer('tidur_siang')->nullable();
            $table->integer('tidur_malam')->nullable();

            $table->text('pola_aktivitas')->nullable();

            $table->integer('mandi')->nullable();
            $table->integer('gosok_gigi')->nullable();
            $table->integer('keramas')->nullable();
            $table->integer('ganti_baju')->nullable();
            $table->integer('ganti_cd')->nullable();

            $table->text('aktivitas_seksual')->nullable();

            $table->text('pola_kebiasaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('askebs', function (Blueprint $table) {
            //
        });
    }
};
