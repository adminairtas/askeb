<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AskebObstetri extends Model
{
    protected $fillable = [
        'askeb_id',
        'kehamilan',
        'jenis_persalinan',
        'penolong',
        'tempat_persalinan',
        'jk_bayi',
        'bb_pb',
        'umur_bayi',
        'keterangan_bayi',
        'laktasi',
        'penyulit_nifas',
    ];

    public function askeb()
    {
        return $this->hasMany(AskebObstetri::class);
    }
}