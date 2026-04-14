<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Askeb;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalMahasiswa = User::where('role','mahasiswa')->count();
        $totalDosen = User::where('role','dosen')->count();

        $totalAskeb = Askeb::count();
        $review = Askeb::where('status','review')->count();
        $revisi = Askeb::where('status','revisi')->count();
        $acc = Askeb::where('status','acc')->count();

        return view('admin.dashboard', compact(
            'totalMahasiswa',
            'totalDosen',
            'totalAskeb',
            'review',
            'revisi',
            'acc'
        ));
    }
     
}