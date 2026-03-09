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

        $table->string('status_imunisasi_tt')->nullable();
        $table->string('jumlah_mms')->nullable();
        $table->string('gerak_janin_usia')->nullable();
        $table->text('obat_didapat')->nullable();

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
