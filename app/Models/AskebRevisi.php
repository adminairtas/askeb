<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AskebRevisi extends Model
{
   protected $fillable = [
    'askeb_id',
    'dosen_id',
    'komentar'
];

public function dosen()
{
    return $this->belongsTo(User::class, 'dosen_id');
}

public function askeb()
{
    return $this->belongsTo(Askeb::class);
}
}
