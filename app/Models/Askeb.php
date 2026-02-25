<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Askeb extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'isi',
        'catatan_dosen',
        'status',
        'kode_validasi',
        'acc_at'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function revisis()
{
    return $this->hasMany(\App\Models\AskebRevisi::class);
}
}