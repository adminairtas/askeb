<?php

namespace App\Http\Controllers;

use App\Models\Askeb;
use Illuminate\Http\Request;
use App\Models\AskebRevisi;

class DosenAskebController extends Controller
{
    public function show($id)
    {
        $askeb = Askeb::with('mahasiswa')
                    ->where('dosen_id', auth()->id())
                    ->findOrFail($id);

        return view('dosen.askeb_show', compact('askeb'));
    }

public function revisi(Request $request, $id)
{
    $request->validate([
        'komentar' => 'required'
    ]);

    $askeb = Askeb::where('dosen_id', auth()->id())
                    ->findOrFail($id);

    // Simpan histori revisi
    AskebRevisi::create([
        'askeb_id' => $askeb->id,
        'dosen_id' => auth()->id(),
        'komentar' => $request->komentar
    ]);

    // Update status askeb
    $askeb->update([
        'status' => 'revisi'
    ]);

    return back()->with('success','Revisi berhasil dikirim');
}
public function acc($id)
{
    $askeb = Askeb::where('dosen_id', auth()->id())
                    ->findOrFail($id);

    $askeb->update([
        'status' => 'acc',
        'komentar' => null // hapus komentar jika ada
    ]);

    return redirect()->route('dashboard')
        ->with('success','ASKEB berhasil di ACC');
}
}