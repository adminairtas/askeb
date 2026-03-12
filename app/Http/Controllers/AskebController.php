<?php

namespace App\Http\Controllers;

use App\Models\Askeb;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;

use App\Models\AskebObstetri;
use App\Models\AskebPenatalaksanaan;


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

        // 3️⃣ Simpan penatalaksanaan
        if ($request->penatalaksanaan) {

            foreach ($request->penatalaksanaan as $value) {

                if ($value != null) {

                    AskebPenatalaksanaan::create([
                        'askeb_id' => $askeb->id,
                        'jam' => $request->jam_penatalaksanaan,
                        'tanggal' => $request->tanggal_penatalaksanaan,
                        'tindakan' => $value
                    ]);
                }
            }
        }

        return redirect()->route('askeb.index')
            ->with('success', 'ASKEB berhasil dikirim.');
    }
    public function show($id)
    {
        $askeb = Askeb::with([
            'mahasiswa',
            'dosen',
            'obstetris',
            'penatalaksanaans',
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

        // hapus penatalaksanaan lama
        $askeb->penatalaksanaans()->delete();

        if ($request->penatalaksanaan) {

            foreach ($request->penatalaksanaan as $value) {

                if ($value != null) {

                    AskebPenatalaksanaan::create([
                        'askeb_id' => $askeb->id,
                        'jam' => $request->jam_penatalaksanaan,
                        'tanggal' => $request->tanggal_penatalaksanaan,
                        'tindakan' => $value
                    ]);
                }
                
            }
        }

        

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
        $askeb = Askeb::with(['mahasiswa', 'dosen', 'obstetris'])
            ->where('mahasiswa_id', auth()->id())
            ->findOrFail($id);

        if ($askeb->status != 'acc') {
            abort(403);
        }

        $pdf = Pdf::loadView('mahasiswa.askeb.pdf', compact('askeb'));

        return $pdf->download('ASKEB-' . $askeb->id . '.pdf');
    }

    public function downloadWord($id)
    {
        $askeb = Askeb::with(['mahasiswa', 'dosen', 'obstetris'])
            ->where('mahasiswa_id', auth()->id())
            ->findOrFail($id);

        if ($askeb->status != 'acc') {
            abort(403);
        }

        $template = new TemplateProcessor(
            storage_path('app/template/laporan_anc_template.docx')
        );

        $template->setValue('asuhan_pada', $askeb->asuhan_pada);
        $template->setValue('tanggal_pengkajian', $askeb->tanggal_pengkajian);
        $template->setValue('pukul', $askeb->pukul);
        $template->setValue('tempat', $askeb->tempat);
        $template->setValue('nama_mahasiswa', $askeb->mahasiswa->name ?? '-');

        $template->setValue('nama_ibu', $askeb->nama_ibu);
        $template->setValue('nama_suami', $askeb->nama_suami);
        $template->setValue('umur_ibu', $askeb->umur_ibu);
        $template->setValue('umur_suami', $askeb->umur_suami);
        $template->setValue('suku_ibu', $askeb->suku_ibu);
        $template->setValue('suku_suami', $askeb->suku_suami);
        $template->setValue('agama_ibu', $askeb->agama_ibu);
        $template->setValue('agama_suami', $askeb->agama_suami);
        $template->setValue('pendidikan_ibu', $askeb->pendidikan_ibu);
        $template->setValue('pendidikan_suami', $askeb->pendidikan_suami);
        $template->setValue('pekerjaan_ibu', $askeb->pekerjaan_ibu);
        $template->setValue('pekerjaan_suami', $askeb->pekerjaan_suami);
        $template->setValue('penghasilan_ibu', $askeb->penghasilan_ibu);
        $template->setValue('penghasilan_suami', $askeb->penghasilan_suami);
        $template->setValue('alamat', $askeb->alamat);

        $template->setValue('keluhan_utama', $askeb->keluhan_utama);

        $template->setValue('menarche', $askeb->menarche);
        $template->setValue('siklus_haid', $askeb->siklus_haid);
        $template->setValue('lama_haid', $askeb->lama_haid);
        $template->setValue('jumlah_haid', $askeb->jumlah_haid);
        $template->setValue('karakteristik_haid', $askeb->karakteristik_haid);

        $template->setValue('usia_pertama_menikah', $askeb->usia_pertama_menikah);
        $template->setValue('lama_menikah', $askeb->lama_menikah);
        $template->setValue('status_pernikahan', $askeb->status_pernikahan);

        $template->setValue('sebelum_hamil_ibu', $askeb->sebelum_hamil_ibu);

        $template->setValue('hpht', $askeb->hpht);
        $template->setValue('hpl', $askeb->hpl);

        $template->setValue('jumlah_periksa', $askeb->jumlah_periksa);
        $template->setValue('status_imunisasi_tt', $askeb->status_imunisasi_tt);
        $template->setValue('jumlah_mms', $askeb->jumlah_mms);
        $template->setValue('gerak_janin_usia', $askeb->gerak_janin_usia);
        $template->setValue('keluhan_hamil', $askeb->keluhan_hamil);
        $template->setValue('obat_didapat', $askeb->obat_didapat);

        $template->setValue('riwayat_kesehatan_ibu', $askeb->riwayat_kesehatan_ibu);
        $template->setValue('riwayat_kesehatan_keluarga', $askeb->riwayat_kesehatan_keluarga);

        $template->setValue('pola_nutrisi', $askeb->pola_nutrisi ?? '-');

        $template->setValue('bak_frekuensi', $askeb->bak_frekuensi ?? '-');
        $template->setValue('bak_konsistensi', $askeb->bak_konsistensi ?? '-');

        $template->setValue('bab_frekuensi', $askeb->bab_frekuensi ?? '-');
        $template->setValue('bab_konsistensi', $askeb->bab_konsistensi ?? '-');

        $template->setValue('tidur_siang', $askeb->tidur_siang ?? '-');
        $template->setValue('tidur_malam', $askeb->tidur_malam ?? '-');

        $template->setValue('pola_aktivitas', $askeb->pola_aktivitas ?? '-');

        $template->setValue('mandi', $askeb->mandi ?? '-');
        $template->setValue('gosok_gigi', $askeb->gosok_gigi ?? '-');
        $template->setValue('keramas', $askeb->keramas ?? '-');
        $template->setValue('ganti_baju', $askeb->ganti_baju ?? '-');
        $template->setValue('ganti_cd', $askeb->ganti_cd ?? '-');

        $template->setValue('aktivitas_seksual', $askeb->aktivitas_seksual ?? '-');

        $template->setValue('pola_kebiasaan', $askeb->pola_kebiasaan ?? '-');

        $template->setValue('kehamilan_ini', $askeb->kehamilan_ini);
        $template->setValue('kondisi_ibu_kehamilan', $askeb->kondisi_ibu_kehamilan);
        $template->setValue('tradisi', $askeb->tradisi);
        $template->setValue('spiritual', $askeb->spiritual);
        $template->setValue('pengetahuan', $askeb->pengetahuan);

        $template->setValue('kesadaran', $askeb->kesadaran);
        $template->setValue('tekanan_darah', $askeb->tekanan_darah);
        $template->setValue('denyut_nadi', $askeb->denyut_nadi);
        $template->setValue('pernafasan', $askeb->pernafasan);
        $template->setValue('suhu', $askeb->suhu);
        $template->setValue('lila', $askeb->lila);
        $template->setValue('berat_tinggi_badan', $askeb->berat_tinggi_badan);
        $template->setValue('berat_sebelum_hamil', $askeb->berat_sebelum_hamil);

        $template->setValue('kepala', $askeb->kepala);
        $template->setValue('muka', $askeb->muka);
        $template->setValue('mata', $askeb->mata);
        $template->setValue('hidung', $askeb->hidung);
        $template->setValue('mulut', $askeb->mulut);
        $template->setValue('leher', $askeb->leher);
        $template->setValue('dada', $askeb->dada);
        $template->setValue('abdomen', $askeb->abdomen);

        $template->setValue('leopold_i', $askeb->leopold_i);
        $template->setValue('leopold_ii', $askeb->leopold_ii);
        $template->setValue('leopold_iii', $askeb->leopold_iii);
        $template->setValue('leopold_iv', $askeb->leopold_iv);

        $template->setValue('tbj', $askeb->tbj);
        $template->setValue('djj', $askeb->djj);


        $template->setValue('gentelia', $askeb->genetalia);
        $template->setValue('anus', $askeb->anus);
        $template->setValue('ekstremitas', $askeb->ekstemitas);

        $template->setValue('distansia_sinarum', $askeb->distansia_sinarum);
        $template->setValue('distansia_kristarum', $askeb->distansia_kristarum);
        $template->setValue('konjugata_eksterna', $askeb->konjugata_eksterna);
        $template->setValue('lingkar_panggul', $askeb->lingkar_panggul);

        $template->setValue('lab_tanggal', $askeb->lab_tanggal ?? '-');
        $template->setValue('lab_tempat', $askeb->lab_tempat ?? '-');
        $template->setValue('lab_hasil', $askeb->lab_hasil ?? '-');

        $template->setValue('diagnosis', $askeb->diagnosis);
        $template->setValue('masalah_potensial', $askeb->masalah_potensial);
        $template->setValue('kebutuhan_segera', $askeb->kebutuhan_segera);

        $template->setValue('jam_penatalaksanaan', $askeb->jam_penatalaksanaan);
        $template->setValue('penatalaksanaan1', $askeb->penatalaksanaan1);
        $template->setValue('penatalaksanaan2', $askeb->penatalaksanaan2);
        $template->setValue('penatalaksanaandst', $askeb->penatalaksanaandst);

        $template->setValue(
            'tanggal_acc',
            $askeb->updated_at
                ? Carbon::parse($askeb->updated_at)->translatedFormat('d F Y')
                : '-'
        );

        $obstetris = $askeb->obstetris;

        if ($obstetris->count() > 0) {

            $template->cloneRow('no', $obstetris->count());

            foreach ($obstetris as $i => $ob) {

                $template->setValue('no#' . ($i + 1), $i + 1);
                $template->setValue('kehamilan#' . ($i + 1), $ob->kehamilan);
                $template->setValue('jenis_persalinan#' . ($i + 1), $ob->jenis_persalinan);
                $template->setValue('penolong#' . ($i + 1), $ob->penolong);
                $template->setValue('tempat_persalinan#' . ($i + 1), $ob->tempat_persalinan);
                $template->setValue('jk_bayi#' . ($i + 1), $ob->jk_bayi);
                $template->setValue('bb_pb#' . ($i + 1), $ob->bb_pb);
                $template->setValue('umur_bayi#' . ($i + 1), $ob->umur_bayi);
                $template->setValue('keterangan_bayi#' . ($i + 1), $ob->keterangan_bayi);
                $template->setValue('laktasi#' . ($i + 1), $ob->laktasi);
                $template->setValue('penyulit_nifas#' . ($i + 1), $ob->penyulit_nifas);
            }
        } else {

            $template->setValue('no', '-');
            $template->setValue('kehamilan', '-');
            $template->setValue('jenis_persalinan', '-');
            $template->setValue('penolong', '-');
            $template->setValue('tempat_persalinan', '-');
            $template->setValue('jk_bayi', '-');
            $template->setValue('bb_pb', '-');
            $template->setValue('umur_bayi', '-');
            $template->setValue('keterangan_bayi', '-');
            $template->setValue('laktasi', '-');
            $template->setValue('penyulit_nifas', '-');
        }

        $template->setValue('nama_dosen', $askeb->dosen->name ?? '-');

        $fileName = 'ASKEB-' . $askeb->id . '.docx';

        $path = storage_path($fileName);

        $template->saveAs($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }




    public function acc($id)
    {
        $askeb = Askeb::findOrFail($id);

        $askeb->update([
            'status' => 'acc',
            'acc_at' => now()
        ]);
        return back();
    }

    public function printPdf($id)
    {
        $askeb = Askeb::with(['mahasiswa', 'dosen', 'obstetris'])
            ->where('mahasiswa_id', auth()->id())
            ->findOrFail($id);

        if ($askeb->status != 'acc') {
            abort(403);
        }

        $pdf = Pdf::loadView('mahasiswa.askeb.pdf', compact('askeb'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('ASKEB-' . $askeb->id . '.pdf');
    }
}
