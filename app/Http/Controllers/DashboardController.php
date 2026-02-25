<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->role === 'admin'){
            return view('admin.dashboard');
        }

        if(auth()->user()->role === 'dosen'){
            return view('dosen.dashboard');
        }

        return view('mahasiswa.dashboard');
    }
}