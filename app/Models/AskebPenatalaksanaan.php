<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AskebPenatalaksanaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'askeb_id',
        'jam',
        'tanggal',
        'tindakan'
    ];

    public function askeb()
    {
        return $this->belongsTo(Askeb::class);
    }
}