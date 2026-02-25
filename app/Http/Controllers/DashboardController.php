<?php

namespace App\Http\Controllers;
use App\Models\Askeb;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    if(auth()->user()->role === 'admin'){
        return view('admin.dashboard');
    }

    if(auth()->user()->role === 'dosen'){

        $askebs = Askeb::where('dosen_id', auth()->id())
                        ->with('mahasiswa')
                        ->latest()
                        ->get();

        $total   = $askebs->count();
        $review  = $askebs->where('status','review')->count();
        $revisi  = $askebs->where('status','revisi')->count();
        $acc     = $askebs->where('status','acc')->count();

        return view('dosen.dashboard', compact(
            'askebs','total','review','revisi','acc'
        ));
    }

    return view('mahasiswa.dashboard');
}
}