<x-app-layout>

    <div class="p-6">
        <div class="max-w-4xl mx-auto">

            <form action="{{ route('askeb.update',$askeb->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-gray-50 p-6 rounded-xl shadow">
                    <h2 class="text-2xl font-bold mb-6 text-purple-700">
                        Edit Laporan ANC
                    </h2>

                    {{-- ================= HEADER ================= --}}
                    <div class="grid grid-cols-2 gap-6 mb-8">

                        <div>
                            <label class="font-semibold">Asuhan Kebidanan Pada</label>
                            <textarea name="asuhan_pada" class="w-full border rounded p-2">{{ old('asuhan_pada', $askeb->asuhan_pada) }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label>Tanggal Pengkajian</label>
                                <input type="date"
                                    name="tanggal_pengkajian"
                                    value="{{ old('tanggal_pengkajian', optional($askeb->tanggal_pengkajian)->format('Y-m-d')) }}"
                                    class="input">
                            </div>

                            <div>
                                <label>Pukul</label>
                                <input type="time"
                                    name="pukul"
                                    value="{{ old('pukul', optional($askeb->pukul)->format('H:i')) }}"
                                    class="input">
                            </div>

                            <div>
                                <label>Tempat</label>
                                <input type="text" name="tempat"
                                    value="{{ old('tempat', $askeb->tempat) }}"
                                    class="w-full border rounded p-2">
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    {{-- ================= BIODATA ================= --}}
                    <h3 class="text-lg font-bold text-purple-700 mb-4">
                        A. Data Subyektif - Biodata
                    </h3>
                    <label class="font-semibold">1. Biodata Identitas</label>
                    <div class="grid grid-cols-2 gap-8 mb-6">

                        <div class="space-y-3">
                            <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $askeb->nama_ibu) }}" placeholder="Nama Ibu" class="input">
                            <input type="text" name="umur_ibu" value="{{ old('umur_ibu', $askeb->umur_ibu) }}" placeholder="Umur" class="input">
                            <input type="text" name="suku_ibu" value="{{ old('suku_ibu', $askeb->suku_ibu) }}" placeholder="Suku/Bangsa" class="input">
                            <input type="text" name="agama_ibu" value="{{ old('agama_ibu', $askeb->agama_ibu) }}" placeholder="Agama" class="input">
                            <input type="text" name="pendidikan_ibu" value="{{ old('pendidikan_ibu', $askeb->pendidikan_ibu) }}" placeholder="Pendidikan" class="input">
                            <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $askeb->pekerjaan_ibu) }}" placeholder="Pekerjaan" class="input">
                            <input type="text" name="penghasilan_ibu" value="{{ old('penghasilan_ibu', $askeb->penghasilan_ibu) }}" placeholder="Penghasilan" class="input">
                        </div>

                        <div class="space-y-3">
                            <input type="text" name="nama_suami" value="{{ old('nama_suami', $askeb->nama_suami) }}" placeholder="Nama Suami" class="input">
                            <input type="text" name="umur_suami" value="{{ old('umur_suami', $askeb->umur_suami) }}" placeholder="Umur" class="input">
                            <input type="text" name="suku_suami" value="{{ old('suku_suami', $askeb->suku_suami) }}" placeholder="Suku/Bangsa" class="input">
                            <input type="text" name="agama_suami" value="{{ old('agama_suami', $askeb->agama_suami) }}" placeholder="Agama" class="input">
                            <input type="text" name="pendidikan_suami" value="{{ old('pendidikan_suami', $askeb->pendidikan_suami) }}" placeholder="Pendidikan" class="input">
                            <input type="text" name="pekerjaan_suami" value="{{ old('pekerjaan_suami', $askeb->pekerjaan_suami) }}" placeholder="Pekerjaan" class="input">
                            <input type="text" name="penghasilan_suami" value="{{ old('penghasilan_suami', $askeb->penghasilan_suami) }}" placeholder="Penghasilan" class="input">
                        </div>
                    </div>

                    <textarea name="alamat" class="w-full border rounded p-2 mb-6">{{ old('alamat', $askeb->alamat) }}</textarea>

                    <label class="font-semibold">2. Keluhatan Utama</label>
                    <textarea name="keluhan_utama" class="w-full border rounded p-2 mb-6">{{ old('keluhan_utama', $askeb->keluhan_utama) }}</textarea>

                    {{-- ================= RIWAYAT MENSTRUASI ================= --}}
                    <label class="font-semibold">3. Riwayat Menstruasi</label>
                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <input type="text" name="menarche" value="{{ old('menarche', $askeb->menarche) }}" placeholder="Menarche" class="input">
                        <input type="text" name="lama_haid" value="{{ old('lama_haid', $askeb->lama_haid) }}" placeholder="Lama haid" class="input">
                        <input type="text" name="jumlah_haid" value="{{ old('jumlah_haid', $askeb->jumlah_haid) }}" placeholder="Jumlah haid" class="input">
                        <input type="text" name="karakteristik_haid" value="{{ old('karakteristik_haid', $askeb->karakteristik_haid) }}" placeholder="Karakteristik" class="input">

                        <div class="col-span-2">
                            <select name="siklus_haid" class="w-full border rounded p-2">
                                <option value="Teratur" {{ old('siklus_haid', $askeb->siklus_haid) == 'Teratur' ? 'selected' : '' }}>Teratur</option>
                                <option value="Tidak Teratur" {{ old('siklus_haid', $askeb->siklus_haid) == 'Tidak Teratur' ? 'selected' : '' }}>Tidak Teratur</option>
                            </select>
                        </div>
                    </div>

                    <label class="font-semibold">4. Riwayat Perkawinan</label>
                    <div class="grid grid-cols-3 gap-6 mb-6">

                        <input
                            type="text"
                            name="usia_pertama_menikah"
                            value="{{ $askeb->usia_pertama_menikah }}"
                            placeholder="Usia Pertama Menikah ...th"
                            class="input">

                        <input
                            type="text"
                            name="lama_menikah"
                            value="{{ $askeb->lama_menikah }}"
                            placeholder="Lama Menikah ...th"
                            class="input">

                        <input
                            type="text"
                            name="status_pernikahan"
                            value="{{ $askeb->status_pernikahan }}"
                            placeholder="Status Pernikahan"
                            class="input">

                    </div>

                    {{-- ================= RIWAYAT OBSTETRI ================= --}}
                    <label class="font-semibold">5. Riwayat Obstetri</label>
                    <div class="overflow-x-auto w-full mb-6">

                        <table class="min-w-[1100px] w-full border border-collapse text-[11px]">
                            <thead class="bg-gray-100 text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Kehamilan</th>
                                    <th>Jenis</th>
                                    <th>Penolong</th>
                                    <th>Tempat</th>
                                    <th>JK</th>
                                    <th>BB/PB</th>
                                    <th>Umur</th>
                                    <th>Ket</th>
                                    <th>Laktasi</th>
                                    <th>Penyulit</th>
                                </tr>
                            </thead>

                            <tbody id="obstetriBody">

                                @forelse($askeb->obstetris as $index => $ob)
                                <tr>
                                    <td class="border p-2 text-center nomor">{{ $index+1 }}</td>

                                    <td class="border p-1"><input type="text" name="kehamilan[]" value="{{ $ob->kehamilan }}" class="input"></td>
                                    <td class="border p-1"><input type="text" name="jenis_persalinan[]" value="{{ $ob->jenis_persalinan }}" class="input"></td>
                                    <td class="border p-1"><input type="text" name="penolong[]" value="{{ $ob->penolong }}" class="input"></td>
                                    <td class="border p-1"><input type="text" name="tempat_persalinan[]" value="{{ $ob->tempat_persalinan }}" class="input"></td>
                                    <td class="border p-1"><input type="text" name="jk_bayi[]" value="{{ $ob->jk_bayi }}" class="input"></td>
                                    <td class="border p-1"><input type="text" name="bb_pb[]" value="{{ $ob->bb_pb }}" class="input"></td>
                                    <td class="border p-1"><input type="text" name="umur_bayi[]" value="{{ $ob->umur_bayi }}" class="input"></td>
                                    <td class="border p-1"><input type="text" name="keterangan_bayi[]" value="{{ $ob->keterangan_bayi }}" class="input"></td>
                                    <td class="border p-1"><input type="text" name="laktasi[]" value="{{ $ob->laktasi }}" class="input"></td>
                                    <td class="border p-1"><input type="text" name="penyulit_nifas[]" value="{{ $ob->penyulit_nifas }}" class="input"></td>

                                </tr>
                                @empty
                                <tr>
                                    <td class="border p-2 text-center nomor">1</td>

                                    <td class="border p-1"><input type="text" name="kehamilan[]" class="input"></td>
                                    <td class="border p-1"><input type="text" name="jenis_persalinan[]" class="input"></td>
                                    <td class="border p-1"><input type="text" name="penolong[]" class="input"></td>
                                    <td class="border p-1"><input type="text" name="tempat_persalinan[]" class="input"></td>
                                    <td class="border p-1"><input type="text" name="jk_bayi[]" class="input"></td>
                                    <td class="border p-1"><input type="text" name="bb_pb[]" class="input"></td>
                                    <td class="border p-1"><input type="text" name="umur_bayi[]" class="input"></td>
                                    <td class="border p-1"><input type="text" name="keterangan_bayi[]" class="input"></td>
                                    <td class="border p-1"><input type="text" name="laktasi[]" class="input"></td>
                                    <td class="border p-1"><input type="text" name="penyulit_nifas[]" class="input"></td>

                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="flex gap-2 mb-6">

                        <button type="button"
                            onclick="tambahBaris()"
                            class="bg-purple-600 text-white px-4 py-2 rounded">
                            + Tambah
                        </button>

                        <button type="button"
                            onclick="hapusBaris()"
                            class="bg-red-500 text-white px-4 py-2 rounded">
                            - Hapus
                        </button>
                    </div>

                    <hr class="my-6">

                    {{-- ================= RIWAYAT KONTRASEPSI ================= --}}
                    <label class="font-semibold">6. Riwayat Kontrasepsi</label>
                    <h5>Sebelum Hamil Ibu :</h5>

                    <div class="grid grid-cols-3 gap-6 mb-6">
                        <input type="text" name="sebelum_hamil_ibu"
                            value="{{ old('sebelum_hamil_ibu', $askeb->sebelum_hamil_ibu) }}"
                            class="input">
                    </div>

                    <hr class="my-6">

                    {{-- ================= RIWAYAT KEHAMILAN SEKARANG ================= --}}
                    <h3 class="font-semibold text-lg mb-3">
                        7. Riwayat Kehamilan Sekarang
                    </h3>

                    <div class="grid grid-cols-2 gap-6 mb-6">

                        <div>
                            <label class="font-medium">HPHT</label>
                            <input type="date"
                                name="hpht"
                                value="{{ old('hpht', optional($askeb->hpht)->format('Y-m-d')) }}"
                                class="input">
                        </div>

                        <div>
                            <label class="font-medium">HPL</label>
                            <input type="date"
                                name="hpl"
                                value="{{ old('hpl', optional($askeb->hpl)->format('Y-m-d')) }}"
                                class="input">
                        </div>

                    </div>


                    <div class="mb-4 text-sm leading-relaxed">

                        Selama hamil ibu memeriksakan kehamilan

                        <input
                            type="text"
                            name="jumlah_periksa"
                            value="{{ old('jumlah_periksa', $askeb->jumlah_periksa) }}"
                            class="border rounded px-2 py-1 w-20 inline"> kali,

                        status imunisasi (TT)

                        <input
                            type="text"
                            name="status_imunisasi_tt"
                            value="{{ old('status_imunisasi_tt', $askeb->status_imunisasi_tt) }}"
                            class="border rounded px-2 py-1 w-28 inline">,

                        jumlah tablet MMS yang telah diminum

                        <input
                            type="text"
                            name="jumlah_mms"
                            value="{{ old('jumlah_mms', $askeb->jumlah_mms) }}"
                            class="border rounded px-2 py-1 w-24 inline"> butir.

                    </div>


                    <div class="mb-4 text-sm">

                        Merasakan gerak janin usia

                        <input
                            type="text"
                            name="gerak_janin_usia"
                            value="{{ old('gerak_janin_usia', $askeb->gerak_janin_usia) }}"
                            class="border rounded px-2 py-1 w-24 inline"> minggu/bulan.

                    </div>


                    <div class="mb-4 text-sm">

                        Keluhan yang pernah dirasakan selama kehamilan sebelumnya

                        <input
                            type="text"
                            name="keluhan_hamil"
                            value="{{ old('keluhan_hamil', $askeb->keluhan_hamil) }}"
                            class="border rounded px-2 py-1 w-80 inline">

                    </div>


                    <div class="mb-6 text-sm">

                        Obat yang didapat oleh ibu

                        <input
                            type="text"
                            name="obat_didapat"
                            value="{{ old('obat_didapat', $askeb->obat_didapat) }}"
                            class="border rounded px-2 py-1 w-80 inline">

                    </div>

                    <hr class="my-6">
                    {{-- ================= RIWAYAT KESEHATAN IBU ================= --}}
                    <label class="font-semibold">8. Riwayat Kesehatan Ibu</label>

                    <div class="mb-6">
                        <textarea name="riwayat_kesehatan_ibu"
                            class="w-full border rounded p-2"
                            placeholder="Riwayat kesehatan ibu">{{ old('riwayat_kesehatan_ibu', $askeb->riwayat_kesehatan_ibu) }}</textarea>
                    </div>

                    <hr class="my-6">

                    {{-- ================= RIWAYAT KESEHATAN KELUARGA ================= --}}
                    <label class="font-semibold">9. Riwayat Kesehatan Keluarga</label>

                    <div class="mb-6">
                        <textarea name="riwayat_kesehatan_keluarga"
                            class="w-full border rounded p-2"
                            placeholder="Riwayat kesehatan keluarga">{{ old('riwayat_kesehatan_keluarga', $askeb->riwayat_kesehatan_keluarga) }}</textarea>
                    </div>

                    <hr class="my-6">

                    {{-- ================= POLA FUNGSIONAL KESEHATAN ================= --}}
                    <label class="font-semibold">10. Pola Fungsional Kesehatan</label>

                    <div class="space-y-4 mb-6">

                        {{-- a. Pola Nutrisi --}}
                        <div>
                            <label class="font-medium">a. Pola nutrisi</label>
                            <input type="text"
                                name="pola_nutrisi"
                                value="{{ old('pola_nutrisi', $askeb->pola_nutrisi) }}"
                                class="w-full border rounded p-2">
                        </div>


                        {{-- b. Pola Eliminasi --}}
                        <div>
                            <label class="font-medium">b. Pola eliminasi</label>

                            <div class="grid grid-cols-2 gap-4 mt-2">

                                <div>
                                    <label class="text-sm">BAK (x/hari)</label>
                                    <input type="number"
                                        name="bak_frekuensi"
                                        value="{{ old('bak_frekuensi', $askeb->bak_frekuensi) }}"
                                        class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="text-sm">Konsistensi BAK</label>
                                    <input type="text"
                                        name="bak_konsistensi"
                                        value="{{ old('bak_konsistensi', $askeb->bak_konsistensi) }}"
                                        class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="text-sm">BAB (x/hari)</label>
                                    <input type="number"
                                        name="bab_frekuensi"
                                        value="{{ old('bab_frekuensi', $askeb->bab_frekuensi) }}"
                                        class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="text-sm">Konsistensi BAB</label>
                                    <input type="text"
                                        name="bab_konsistensi"
                                        value="{{ old('bab_konsistensi', $askeb->bab_konsistensi) }}"
                                        class="w-full border rounded p-2">
                                </div>

                            </div>
                        </div>


                        {{-- c. Pola Istirahat --}}
                        <div>
                            <label class="font-medium">c. Pola istirahat</label>

                            <div class="grid grid-cols-2 gap-4 mt-2">

                                <div>
                                    <label class="text-sm">Tidur siang (jam/hari)</label>
                                    <input type="number"
                                        name="tidur_siang"
                                        value="{{ old('tidur_siang', $askeb->tidur_siang) }}"
                                        class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="text-sm">Tidur malam (jam/hari)</label>
                                    <input type="number"
                                        name="tidur_malam"
                                        value="{{ old('tidur_malam', $askeb->tidur_malam) }}"
                                        class="w-full border rounded p-2">
                                </div>

                            </div>
                        </div>


                        {{-- d. Pola Aktivitas --}}
                        <div>
                            <label class="font-medium">d. Pola aktivitas</label>
                            <input type="text"
                                name="pola_aktivitas"
                                value="{{ old('pola_aktivitas', $askeb->pola_aktivitas) }}"
                                class="w-full border rounded p-2">
                        </div>


                        {{-- e. Personal Hygiene --}}
                        <div>
                            <label class="font-medium">e. Personal hygiene</label>

                            <div class="grid grid-cols-3 gap-4 mt-2">

                                <div>
                                    <label class="text-sm">Mandi (x/hari)</label>
                                    <input type="number"
                                        name="mandi"
                                        value="{{ old('mandi', $askeb->mandi) }}"
                                        class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="text-sm">Gosok gigi (x/hari)</label>
                                    <input type="number"
                                        name="gosok_gigi"
                                        value="{{ old('gosok_gigi', $askeb->gosok_gigi) }}"
                                        class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="text-sm">Keramas (x/minggu)</label>
                                    <input type="number"
                                        name="keramas"
                                        value="{{ old('keramas', $askeb->keramas) }}"
                                        class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="text-sm">Ganti baju (x/hari)</label>
                                    <input type="number"
                                        name="ganti_baju"
                                        value="{{ old('ganti_baju', $askeb->ganti_baju) }}"
                                        class="w-full border rounded p-2">
                                </div>

                                <div>
                                    <label class="text-sm">Ganti celana dalam (x/hari)</label>
                                    <input type="number"
                                        name="ganti_cd"
                                        value="{{ old('ganti_cd', $askeb->ganti_cd) }}"
                                        class="w-full border rounded p-2">
                                </div>

                            </div>
                        </div>


                        {{-- f. Aktivitas Seksual --}}
                        <div>
                            <label class="font-medium">f. Aktivitas seksual</label>

                            <input type="text"
                                name="aktivitas_seksual"
                                value="{{ old('aktivitas_seksual', $askeb->aktivitas_seksual) }}"
                                class="w-full border rounded p-2">
                        </div>


                        {{-- g. Pola Kebiasaan --}}
                        <div>
                            <label class="font-medium">g. Pola kebiasaan</label>

                            <input type="text"
                                name="pola_kebiasaan"
                                value="{{ old('pola_kebiasaan', $askeb->pola_kebiasaan) }}"
                                class="w-full border rounded p-2">
                        </div>

                    </div>

                    <hr class="my-6">

                    {{-- ================= SOSIAL BUDAYA ================= --}}
                    <label class="font-semibold">11. Riwayat Sosial Budaya, Pengetahuan dan Spiritual</label>

                    <div class="grid grid-cols-2 gap-8 mb-6">

                        <div class="space-y-3">

                            <input type="text"
                                name="kehamilan_ini"
                                value="{{ old('kehamilan_ini', $askeb->kehamilan_ini) }}"
                                placeholder="Kehamilan Ini"
                                class="input">

                            <div>
                                <label>Kondisi Ibu dengan Kehamilan</label>
                                <select name="kondisi_ibu_kehamilan" class="w-full border rounded p-2">

                                    <option value="Senang"
                                        {{ old('kondisi_ibu_kehamilan', $askeb->kondisi_ibu_kehamilan) == 'Senang' ? 'selected' : '' }}>
                                        Senang dengan Kehamilan
                                    </option>

                                    <option value="Tidak_senang"
                                        {{ old('kondisi_ibu_kehamilan', $askeb->kondisi_ibu_kehamilan) == 'Tidak_senang' ? 'selected' : '' }}>
                                        Tidak Senang dengan Kehamilan
                                    </option>

                                </select>
                            </div>

                            <input type="text"
                                name="Tradisi"
                                value="{{ old('Tradisi', $askeb->tradisi) }}"
                                placeholder="Tradisi"
                                class="input">

                            <input type="text"
                                name="Spiritual"
                                value="{{ old('Spiritual', $askeb->spiritual) }}"
                                placeholder="Spiritual"
                                class="input">

                            <input type="text"
                                name="Pengetahuan"
                                value="{{ old('Pengetahuan', $askeb->pengetahuan) }}"
                                placeholder="Pengetahuan"
                                class="input">

                        </div>

                    </div>

                    <hr class="my-6">

                    {{-- ================= DATA OBYEKTIF ================= --}}
                    <h3 class="text-lg font-bold text-purple-700 mb-4">
                        B. Data Obyektif
                    </h3>

                    <div class="grid grid-cols-2 gap-4 mb-4">

                        {{-- ================= PEMERIKSAAN UMUM ================= --}}
                        <div class="space-y-3">

                            <h4 class="font-semibold">1. Pemeriksaan Umum</h4>

                            <input type="text" name="kesadaran"
                                value="{{ old('kesadaran', $askeb->kesadaran) }}"
                                placeholder="Kesadaran" class="input">

                            <input type="text" name="tekanan_darah"
                                value="{{ old('tekanan_darah', $askeb->tekanan_darah) }}"
                                placeholder="Tekanan Darah" class="input">

                            <input type="text" name="denyut_nadi"
                                value="{{ old('denyut_nadi', $askeb->denyut_nadi) }}"
                                placeholder="Denyut Nadi" class="input">

                            <input type="text" name="pernafasan"
                                value="{{ old('pernafasan', $askeb->pernafasan) }}"
                                placeholder="Pernafasan" class="input">

                        </div>

                        <div class="space-y-3">

                            <br>

                            <input type="text" name="suhu"
                                value="{{ old('suhu', $askeb->suhu) }}"
                                placeholder="Suhu Tubuh" class="input">

                            <input type="text" name="lila"
                                value="{{ old('lila', $askeb->lila) }}"
                                placeholder="LILA" class="input">

                            <input type="text" name="berat_tinggi_badan"
                                value="{{ old('berat_tinggi_badan', $askeb->berat_tinggi_badan) }}"
                                placeholder="Berat / Tinggi Badan" class="input">

                            <input type="text" name="berat_sebelum_hamil"
                                value="{{ old('berat_sebelum_hamil', $askeb->berat_sebelum_hamil) }}"
                                placeholder="Berat Sebelum Hamil" class="input">

                        </div>

                    </div>

                    <hr class="my-6">

                    {{-- ================= PEMERIKSAAN FISIK ================= --}}
                    <div class="space-y-3">

                        <h4 class="font-semibold">2. Pemeriksaan Fisik</h4>

                        <h5>A. Kepala</h5>
                        <textarea name="kepala" class="w-full border rounded p-2 mb-4">
                        {{ old('kepala', $askeb->kepala) }}
                        </textarea>

                        <h5>B. Muka</h5>
                        <textarea name="muka" class="w-full border rounded p-2 mb-4">
                        {{ old('muka', $askeb->muka) }}
                        </textarea>

                        <h5>C. Mata</h5>
                        <textarea name="mata" class="w-full border rounded p-2 mb-4">
                        {{ old('mata', $askeb->mata) }}
                        </textarea>

                        <h5>D. Hidung</h5>
                        <textarea name="hidung" class="w-full border rounded p-2 mb-4">
                        {{ old('hidung', $askeb->hidung) }}
                        </textarea>

                        <h5>E. Mulut</h5>
                        <textarea name="mulut" class="w-full border rounded p-2 mb-4">
                        {{ old('mulut', $askeb->mulut) }}
                        </textarea>

                        <h5>F. Leher</h5>
                        <textarea name="leher" class="w-full border rounded p-2 mb-4">
                        {{ old('leher', $askeb->leher) }}
                        </textarea>

                        <h5>G. Dada</h5>
                        <textarea name="dada" class="w-full border rounded p-2 mb-4">
                        {{ old('dada', $askeb->dada) }}
                        </textarea>

                        <h5>H. Abdomen</h5>
                        <textarea name="abdomen" class="w-full border rounded p-2 mb-4">
                        {{ old('abdomen', $askeb->abdomen) }}
                        </textarea>

                        <input type="text" name="leopold_i"
                            value="{{ old('leopold_i', $askeb->leopold_i) }}"
                            placeholder="Leopold I" class="input">

                        <input type="text" name="leopold_ii"
                            value="{{ old('leopold_ii', $askeb->leopold_ii) }}"
                            placeholder="Leopold II" class="input">

                        <input type="text" name="leopold_iii"
                            value="{{ old('leopold_iii', $askeb->leopold_iii) }}"
                            placeholder="Leopold III" class="input">

                        <input type="text" name="leopold_iv"
                            value="{{ old('leopold_iv', $askeb->leopold_iv) }}"
                            placeholder="Leopold IV" class="input">

                        <input type="text" name="tbj"
                            value="{{ old('tbj', $askeb->tbj) }}"
                            placeholder="TBJ" class="input">

                        <input type="text" name="djj"
                            value="{{ old('djj', $askeb->djj) }}"
                            placeholder="DJJ" class="input">

                        <h5>I. Genetalia</h5>
                        <textarea name="genetalia" class="w-full border rounded p-2 mb-4">
                        {{ old('genetalia', $askeb->genetalia) }}
                        </textarea>

                        <h5>J. Anus</h5>
                        <textarea name="anus" class="w-full border rounded p-2 mb-4">
                        {{ old('anus', $askeb->anus) }}
                        </textarea>

                        <h5>K. Ekstemitas</h5>
                        <textarea name="ekstemitas" class="w-full border rounded p-2 mb-4">
                        {{ old('ekstemitas', $askeb->ekstemitas) }}
                        </textarea>

                    </div>

                    <hr class="my-6">

                    {{-- ================= PEMERIKSAAN PANGGUL LUAR ================= --}}
                    <div class="grid grid-cols-2 gap-4 mb-4">

                        <div class="space-y-3">

                            <h4 class="font-semibold">3. Pemeriksaan Panggul Luar</h4>

                            <input type="text" name="distansia_sinarum"
                                value="{{ old('distansia_sinarum', $askeb->distansia_sinarum) }}"
                                placeholder="Distansia Spinarum" class="input">

                            <input type="text" name="distansia_kristarum"
                                value="{{ old('distansia_kristarum', $askeb->distansia_kristarum) }}"
                                placeholder="Distansia Kristarum" class="input">

                        </div>

                        <div class="space-y-3">

                            <br>

                            <input type="text" name="konjugata_eksterna"
                                value="{{ old('konjugata_eksterna', $askeb->konjugata_eksterna) }}"
                                placeholder="Konjugata Eksterna" class="input">

                            <input type="text" name="lingkar_panggul"
                                value="{{ old('lingkar_panggul', $askeb->lingkar_panggul) }}"
                                placeholder="Lingkar Panggul" class="input">

                        </div>

                    </div>

                    <hr class="my-6">
                    <label class="font-semibold">4. Pemeriksaan Penunjang / Laboratorium</label>

                    <div class="grid grid-cols-2 gap-4 mt-2 mb-4">

                        <div>
                            <label class="text-sm">Tanggal</label>
                            <input type="date"
                                name="lab_tanggal"
                                value="{{ old('lab_tanggal', $askeb->lab_tanggal) }}"
                                class="w-full border rounded p-2">
                        </div>

                        <div>
                            <label class="text-sm">Tempat</label>
                            <input type="text"
                                name="lab_tempat"
                                value="{{ old('lab_tempat', $askeb->lab_tempat) }}"
                                class="w-full border rounded p-2">
                        </div>

                    </div>

                    <div class="mb-6">

                        <label class="text-sm">Hasil</label>

                        <textarea
                            name="lab_hasil"
                            rows="3"
                            class="w-full border rounded p-2">{{ old('lab_hasil', $askeb->lab_hasil) }}</textarea>

                    </div>

                    <hr class="my-6">
                    {{-- ================= ANALISIS & PENATALAKSANAAN ================= --}}
                    <h3 class="text-lg font-bold text-purple-700 mb-4">
                        C. Analisis Data
                    </h3>

                    <h4 class="font-semibold">1. Diagnosis</h4>
                    <textarea name="diagnosis" class="w-full border rounded p-2 mb-4"
                        placeholder="Diagnosis">{{ old('diagnosis', $askeb->diagnosis) }}</textarea>

                    <h4 class="font-semibold">2. Masalah Potensial</h4>
                    <textarea name="masalah_potensial" class="w-full border rounded p-2 mb-4"
                        placeholder="Masalah Potensial">{{ old('masalah_potensial', $askeb->masalah_potensial) }}</textarea>

                    <h4 class="font-semibold">3. Kebutuhan Segera</h4>
                    <textarea name="kebutuhan_segera" class="w-full border rounded p-2 mb-4"
                        placeholder="Kebutuhan Segera">{{ old('kebutuhan_segera', $askeb->kebutuhan_segera) }}</textarea>


                    <h3 class="text-lg font-bold text-purple-700 mb-4">
                        D. Penatalaksanaan
                    </h3>

                    <div class="grid md:grid-cols-2 gap-4 mb-6">

                        <div>
                            <label class="font-semibold">Jam</label>
                            <input type="time"
                                name="jam_penatalaksanaan"
                                value="{{ $askeb->penatalaksanaans->first()->jam ?? '' }}"
                                class="input">
                        </div>

                        <div>
                            <label class="font-semibold">Tanggal</label>
                            <input type="date"
                                name="tanggal_penatalaksanaan"
                                value="{{ $askeb->penatalaksanaans->first()->tanggal ?? '' }}"
                                class="input">
                        </div>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full border text-sm">

                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-2 py-1 w-10">No</th>
                                    <th class="border px-2 py-1">Penatalaksanaan</th>
                                    <th class="border px-2 py-1 w-20">Aksi</th>
                                </tr>
                            </thead>

                            <tbody id="penatalaksanaan-table">

                                @forelse($askeb->penatalaksanaans as $index => $item)

                                <tr>

                                    <td class="border text-center">{{ $index+1 }}</td>

                                    <td class="border p-1">
                                        <input type="text"
                                            name="penatalaksanaan[]"
                                            value="{{ $item->tindakan }}"
                                            class="w-full border rounded p-2">
                                    </td>

                                    <td class="border text-center">
                                        <button type="button"
                                            onclick="removeRow(this)"
                                            class="bg-red-500 text-white px-2 py-1 rounded">
                                            Hapus
                                        </button>
                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td class="border text-center">1</td>

                                    <td class="border p-1">
                                        <input type="text"
                                            name="penatalaksanaan[]"
                                            class="w-full border rounded p-2">
                                    </td>

                                    <td class="border text-center">
                                        <button type="button"
                                            onclick="removeRow(this)"
                                            class="bg-red-500 text-white px-2 py-1 rounded">
                                            Hapus
                                        </button>
                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                        <button type="button"
                            onclick="addRow()"
                            class="bg-purple-600 text-white px-3 py-1 rounded mt-3">
                            + Tambah Penatalaksanaan
                        </button>

                    </div>
                    <div class="mt-8 text-right">
                        <button class="bg-purple-600 text-white px-6 py-2 rounded">
                            Update Laporan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>
        function tambahBaris() {

            let table = document.getElementById("obstetriBody");
            let rowCount = table.rows.length;

            let row = table.insertRow();

            row.innerHTML = `
<td class="border p-2 text-center nomor">${rowCount + 1}</td>

<td class="border p-1"><input type="text" name="kehamilan[]" class="input"></td>
<td class="border p-1"><input type="text" name="jenis_persalinan[]" class="input"></td>
<td class="border p-1"><input type="text" name="penolong[]" class="input"></td>
<td class="border p-1"><input type="text" name="tempat_persalinan[]" class="input"></td>
<td class="border p-1"><input type="text" name="jk_bayi[]" class="input"></td>
<td class="border p-1"><input type="text" name="bb_pb[]" class="input"></td>
<td class="border p-1"><input type="text" name="umur_bayi[]" class="input"></td>
<td class="border p-1"><input type="text" name="keterangan_bayi[]" class="input"></td>
<td class="border p-1"><input type="text" name="laktasi[]" class="input"></td>
<td class="border p-1"><input type="text" name="penyulit_nifas[]" class="input"></td>
`;

        }

        function hapusBaris() {

            let table = document.getElementById("obstetriBody");

            if (table.rows.length > 1) {
                table.deleteRow(table.rows.length - 1);
            }

        }
    </script>

    <script>
        function addRow() {

            let table = document.getElementById("penatalaksanaan-table");

            let rowCount = table.rows.length + 1;

            let row = `
<tr>

<td class="border text-center">${rowCount}</td>

<td class="border p-1">
<input type="text" name="penatalaksanaan[]" class="w-full border rounded p-2">
</td>

<td class="border text-center">
<button type="button"
onclick="removeRow(this)"
class="bg-red-500 text-white px-2 py-1 rounded">
Hapus
</button>
</td>

</tr>
`;

            table.insertAdjacentHTML('beforeend', row);

        }

        function removeRow(btn) {

            btn.closest("tr").remove();

            reNumber();

        }

        function reNumber() {

            let table = document.getElementById("penatalaksanaan-table");

            for (let i = 0; i < table.rows.length; i++) {

                table.rows[i].cells[0].innerText = i + 1;

            }

        }
    </script>

</x-app-layout>