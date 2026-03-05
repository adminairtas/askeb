<?php

namespace App\Http\Controllers;

use App\Models\Askeb;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\AskebObstetri;


class AskebController extends Controller
{
    public function index()
    {
        $askebs = Askeb::with('dosen')
                        ->where('mahasiswa_id', auth()->id())
                        ->latest()
                        ->get();

        return view('mahasiswa.askeb.index', compact('askebs'));
    }

    public function create()
    {
        $dosens = User::where('role', 'dosen')->get();

        return view('mahasiswa.askeb.create', compact('dosens'));
    }


public function store(Request $request)
{
    // 1️⃣ Simpan askeb utama
    $askeb = Askeb::create(
        array_merge(
            $request->except('_token'),
            [
                'mahasiswa_id' => auth()->id(),
                'status' => 'review'
            ]
        )
    );

    // 2️⃣ Simpan riwayat obstetri
    if ($request->kehamilan) {

        foreach ($request->kehamilan as $index => $value) {

            if ($value != null) {

                AskebObstetri::create([
                    'askeb_id' => $askeb->id,
                    'kehamilan' => $request->kehamilan[$index] ?? null,
                    'jenis_persalinan' => $request->jenis_persalinan[$index] ?? null,
                    'penolong' => $request->penolong[$index] ?? null,
                    'tempat_persalinan' => $request->tempat_persalinan[$index] ?? null,
                    'jk_bayi' => $request->jk_bayi[$index] ?? null,
                    'bb_pb' => $request->bb_pb[$index] ?? null,
                    'umur_bayi' => $request->umur_bayi[$index] ?? null,
                    'keterangan_bayi' => $request->keterangan_bayi[$index] ?? null,
                    'laktasi' => $request->laktasi[$index] ?? null,
                    'penyulit_nifas' => $request->penyulit_nifas[$index] ?? null,
                ]);
            }
        }
    }

    return redirect()->route('askeb.index')
        ->with('success','ASKEB berhasil dikirim.');
}
public function show($id)
{
    $askeb = Askeb::with([
                    'mahasiswa',
                    'dosen',
                    'obstetris',
                    'revisis'   // ⬅ TAMBAHKAN INI
                ])
                ->where('mahasiswa_id', auth()->id())
                ->findOrFail($id);

    return view('mahasiswa.askeb.show', compact('askeb'));
}

    public function edit($id)
    {
        $askeb = Askeb::where('mahasiswa_id', auth()->id())
                        ->where('status', 'revisi')
                        ->findOrFail($id);

        return view('mahasiswa.askeb.edit', compact('askeb'));
    }

    public function update(Request $request, $id)
{
    $askeb = Askeb::where('mahasiswa_id', auth()->id())
                    ->where('status', 'revisi')
                    ->findOrFail($id);

    // 1️⃣ Update data utama
    $askeb->update(
        $request->except('_token', '_method', 'kehamilan')
    );

    // 2️⃣ Hapus riwayat obstetri lama
    $askeb->obstetris()->delete();

    // 3️⃣ Simpan ulang riwayat obstetri
    if ($request->kehamilan) {

        foreach ($request->kehamilan as $index => $value) {

            if ($value != null) {

                AskebObstetri::create([
                    'askeb_id' => $askeb->id,
                    'kehamilan' => $request->kehamilan[$index] ?? null,
                    'jenis_persalinan' => $request->jenis_persalinan[$index] ?? null,
                    'penolong' => $request->penolong[$index] ?? null,
                    'tempat_persalinan' => $request->tempat_persalinan[$index] ?? null,
                    'jk_bayi' => $request->jk_bayi[$index] ?? null,
                    'bb_pb' => $request->bb_pb[$index] ?? null,
                    'umur_bayi' => $request->umur_bayi[$index] ?? null,
                    'keterangan_bayi' => $request->keterangan_bayi[$index] ?? null,
                    'laktasi' => $request->laktasi[$index] ?? null,
                    'penyulit_nifas' => $request->penyulit_nifas[$index] ?? null,
                ]);
            }
        }
    }

    // 4️⃣ Ubah status kembali ke review
    $askeb->update([
        'status' => 'review'
    ]);
    

    return redirect()->route('askeb.index')
        ->with('success', 'ASKEB berhasil diperbarui dan dikirim ulang.');
        
}


public function downloadPdf($id)
{
    $askeb = Askeb::with(['mahasiswa','dosen','obstetris'])
                    ->where('mahasiswa_id', auth()->id())
                    ->findOrFail($id);

    if ($askeb->status != 'acc') {
        abort(403);
    }

    $pdf = Pdf::loadView('mahasiswa.askeb.pdf', compact('askeb'));

    return $pdf->download('ASKEB-'.$askeb->id.'.pdf');
}

}