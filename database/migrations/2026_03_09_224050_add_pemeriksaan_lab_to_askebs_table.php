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
        Schema::table('askebs', function (Blueprint $table) {

            $table->date('lab_tanggal')->nullable();
            $table->string('lab_tempat')->nullable();
            $table->text('lab_hasil')->nullable();
        });
    }

    public function down()
    {
        Schema::table('askebs', function (Blueprint $table) {

            $table->dropColumn([
                'lab_tanggal',
                'lab_tempat',
                'lab_hasil'
            ]);
        });
    }
};
