<?php

namespace App\Http\Controllers;

use App\Models\Askeb;
use App\Models\Dosen;
use Illuminate\Http\Request;

class AskebController extends Controller
{
    public function index()
    {
        $askebs = Askeb::where('mahasiswa_id', auth()->id())->latest()->get();
        return view('mahasiswa.askeb.index', compact('askebs'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        return view('mahasiswa.askeb.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        Askeb::create([
            'mahasiswa_id' => auth()->id(),
            'dosen_id' => $request->dosen_id,
            'isi' => $request->isi,
            'status' => 'review'
        ]);

        return redirect()->route('askeb.index')
                         ->with('success','ASKEB berhasil dikirim ke dosen.');
    }
}