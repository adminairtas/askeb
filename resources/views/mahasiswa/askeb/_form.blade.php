<div class="max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-bold mb-6 text-purple-700">
        Form Laporan ANC
    </h2>

    {{-- ================= HEADER ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <div>
            <label class="font-semibold">Asuhan Kebidanan Pada</label>
            <textarea name="asuhan_pada" class="w-full border rounded p-2"></textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label>Tanggal Pengkajian</label>
                <input type="date" name="tanggal_pengkajian" class="w-full border rounded p-2">
            </div>

            <div>
                <label>Pukul</label>
                <input type="time" name="pukul" class="w-full border rounded p-2">
            </div>

            <div>
                <label>Tempat</label>
                <input type="text" name="tempat" class="w-full border rounded p-2">
            </div>

            <div>
                <label>Oleh</label>
                <input type="text" name="oleh"
                    value="{{ auth()->user()->name }}"
                    readonly
                    class="w-full border rounded p-2 bg-gray-100">
            </div>
        </div>

    </div>

    <hr class="my-6">

    {{-- ================= BIODATA ================= --}}
    <h3 class="text-lg font-bold text-purple-700 mb-4">
        A. Data Subyektif - Biodata
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">

        {{-- IBU --}}
        <div class="space-y-3">

            <h4 class="font-semibold">1. Biodata/Identitas</h4>

            <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="input">
            <input type="text" name="umur_ibu" placeholder="Umur" class="input">
            <input type="text" name="suku_ibu" placeholder="Suku/Bangsa" class="input">
            <input type="text" name="agama_ibu" placeholder="Agama" class="input">
            <input type="text" name="pendidikan_ibu" placeholder="Pendidikan" class="input">
            <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan" class="input">
            <input type="text" name="penghasilan_ibu" placeholder="Penghasilan" class="input">
        </div>

        {{-- SUAMI --}}
        <div class="space-y-3">
            <br>
            <input type="text" name="nama_suami" placeholder="Nama Suami" class="input">
            <input type="text" name="umur_suami" placeholder="Umur" class="input">
            <input type="text" name="suku_suami" placeholder="Suku/Bangsa" class="input">
            <input type="text" name="agama_suami" placeholder="Agama" class="input">
            <input type="text" name="pendidikan_suami" placeholder="Pendidikan" class="input">
            <input type="text" name="pekerjaan_suami" placeholder="Pekerjaan" class="input">
            <input type="text" name="penghasilan_suami" placeholder="Penghasilan" class="input">
        </div>

    </div>

    <div class="mb-6">
        <textarea name="alamat" placeholder="Alamat Lengkap" class="w-full border rounded p-2"></textarea>
    </div>

    <hr class="my-6">
    <div class="my-6">
        <label class="font-semibold">2. Keluhan Utama</label>
        <textarea name="keluhan_utama" placeholder="Keluhan Utama" class="w-full border rounded p-2"></textarea>
    </div>

    <hr class="my-6">
    <div class="my-6">
        {{-- ================= RIWAYAT MENSTRUASI ================= --}}
        <label class="font-semibold">3. Riwayat Menstruasi</label>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
            <input type="text" name="menarche" placeholder="Menarche (th)" class="input"> th
            <input type="text" name="lama_haid" placeholder="Lama haid (hari)" class="input"> hari
            <input type="text" name="jumlah_haid" placeholder="Jumlah (cc)" class="input"> cc
            <input type="text" name="karakteristik_haid" placeholder="Karakteristik" class="input">

            <div class="col-span-2">
                <label>Siklus haid</label>
                <select name="siklus_haid" class="w-full border rounded p-2">
                    <option value="Teratur">Teratur</option>
                    <option value="Tidak Teratur">Tidak Teratur</option>
                </select>
            </div>
        </div>

        <hr class="my-6">
        <div class="my-6">
        {{-- ================= RIWAYAT PERKAWINAN ================= --}}
        <label class="font-semibold">4. Riwayat Perkawinan</label>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6 mb-6">
            <input type="text" name="usia_pertama_menikah" placeholder="Usia Pertama Menikah ...th" class="input"> Tahun
            <input type="text" name="lama_menikah" placeholder="Lama Menikah ...th" class="input"> Tahun
            <input type="text" name="status_pernikahan" placeholder="Status Pernikahan" class="input">
        </div>
        </div>

        <hr class="my-6">
        {{-- ================= RIWAYAT OBSTETRI ================= --}}
        <label class="font-semibold">5. Riwayat Obstetri</label>

        <div class="overflow-x-auto mb-4">
            <table class="w-full border border-collapse text-[11px]">
                <thead class="bg-gray-100 text-center">
                    <tr>
                        <th rowspan="2" class="border px-1 py-1">No</th>
                        <th rowspan="2" class="border px-1 py-1">Kehamilan</th>
                        <th colspan="3" class="border px-1 py-1">Persalinan</th>
                        <th colspan="4" class="border px-1 py-1">Bayi</th>
                        <th colspan="2" class="border px-1 py-1">Nifas</th>
                    </tr>
                    <tr>
                        <th class="border px-1 py-1">Jenis</th>
                        <th class="border px-1 py-1">Penolong</th>
                        <th class="border px-1 py-1">Tempat</th>
                        <th class="border px-1 py-1">JK</th>
                        <th class="border px-1 py-1">BB/PB</th>
                        <th class="border px-1 py-1">Umur</th>
                        <th class="border px-1 py-1">Ket</th>
                        <th class="border px-1 py-1">Laktasi</th>
                        <th class="border px-1 py-1">Penyulit</th>
                    </tr>
                </thead>
                <tbody id="obstetriBody">
                    @for($i = 0; $i < 3; $i++)
                        <tr>
                        <td class="border p-2 text-center nomor">{{ $i+1 }}</td>

                        <td class="border p-2"><input type="text" name="kehamilan[]" class="input"></td>
                        <td class="border p-2"><input type="text" name="jenis_persalinan[]" class="input"></td>
                        <td class="border p-2"><input type="text" name="penolong[]" class="input"></td>
                        <td class="border p-2"><input type="text" name="tempat_persalinan[]" class="input"></td>
                        <td class="border p-2"><input type="text" name="jk_bayi[]" class="input"></td>
                        <td class="border p-2"><input type="text" name="bb_pb[]" class="input"></td>
                        <td class="border p-2"><input type="text" name="umur_bayi[]" class="input"></td>
                        <td class="border p-2"><input type="text" name="keterangan_bayi[]" class="input"></td>
                        <td class="border p-2"><input type="text" name="laktasi[]" class="input"></td>
                        <td class="border p-2"><input type="text" name="penyulit_nifas[]" class="input"></td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>

        <div class="flex gap-3 mb-6">
            <button type="button" onclick="tambahBaris()"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                + Tambah Baris
            </button>

            <button type="button" onclick="hapusBaris()"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                - Hapus Baris
            </button>
        </div>


        <hr class="my-6">
        {{-- ================= RIWAYAT KONTRASEPSI ================= --}}
        <label class="font-semibold">6. Riwayat Kontrasepsi</label>
        <h5>Sebelum Hamil Ibu :</h5>
        <div class="grid grid-cols-3 gap-6 mb-6">
            <input type="text" name="sebelum_hamil_ibu" class="input">
        </div>

        <hr class="my-6">
        {{-- ================= RIWAYAT KEHAMILAN ================= --}}
        <div class="mt-6">

            <label class="font-semibold">7. Riwayat Kehamilan Sekarang</label>

            <div class="grid grid-cols-2 gap-4 mt-3">

                <div>
                    <label>HPHT</label>
                    <input type="date" name="hpht" class="input w-full">
                </div>

                <div>
                    <label>HPL</label>
                    <input type="date" name="hpl" class="input w-full">
                </div>

            </div>

            <div class="mt-4 leading-8 text-justify">

                <p>
                    Selama hamil ibu memeriksakan kehamilan
                    <input type="text" name="jumlah_periksa" class="input w-16 inline text-center">
                    kali, status imunisasi (TT)
                    <input type="text" name="status_imunisasi_tt" class="input w-20 inline text-center">,
                    jumlah tablet MMS yang telah diminum
                    <input type="text" name="jumlah_mms" class="input w-20 inline text-center">
                    butir.

                    Ibu mulai merasakan gerak janin pada usia
                    <input type="text" name="gerak_janin_usia" class="input w-24 inline text-center">
                    minggu/bulan.

                    Keluhan yang pernah dirasakan selama kehamilan sebelumnya adalah
                    <input type="text" name="keluhan_hamil" class="input w-64 inline">.

                    Obat yang diperoleh ibu selama kehamilan yaitu
                    <input type="text" name="obat_didapat" class="input w-64 inline">.
                </p>

            </div>

            <hr class="my-6">
            {{-- ================= RIWAYAT KESEHATAN IBU================= --}}
            <label class="font-semibold">8. Riwayat Kesehatan Ibu</label>

            <div class="mb-6">
                <textarea name="riwayat_kesehatan_ibu" placeholder="Riwayat Kesehatan Ibu"
                    class="w-full border rounded p-2"></textarea>
            </div>

            {{-- ================= RIWAYAT KESEHATAN KELUARGA ================= --}}
            <label class="font-semibold">9. Riwayat Kesehatan Keluarga</label>

            <div class="mb-6">
                <textarea name="riwayat_kesehatan_keluarga" placeholder="Riwayat Kesehatan Keluarga"
                    class="w-full border rounded p-2"></textarea>
            </div>

            <hr class="my-6">
            {{-- ================= POLA FUNGSIONAL KESEHATAN ================= --}}
            <h3 class="font-semibold text-lg mt-6 mb-4">
                10. Pola Fungsional Kesehatan
            </h3>

            <div class="space-y-4">

                <div>
                    <label>Pola nutrisi</label>
                    <input type="text" name="pola_nutrisi" class="input w-full">
                </div>


                <div>
                    <label>Pola eliminasi</label>

                    <div class="flex gap-2 mt-2 items-center">
                        BAK :
                        <input type="number" name="bak_frekuensi" class="input w-20">
                        x/hari
                        konsistensi
                        <input type="text" name="bak_konsistensi" class="input w-40">
                    </div>

                    <div class="flex gap-2 mt-2 items-center">
                        BAB :
                        <input type="number" name="bab_frekuensi" class="input w-20">
                        x/hari
                        konsistensi
                        <input type="text" name="bab_konsistensi" class="input w-40">
                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label>Tidur siang</label>
                        <div class="flex gap-2 items-center">
                            <input type="number" name="tidur_siang" class="input w-24">
                            jam / hari
                        </div>
                    </div>

                    <div>
                        <label>Tidur malam</label>
                        <div class="flex gap-2 items-center">
                            <input type="number" name="tidur_malam" class="input w-24">
                            jam / hari
                        </div>
                    </div>

                </div>


                <div>
                    <label>Pola aktivitas</label>
                    <input type="text" name="pola_aktivitas" class="input w-full">
                </div>


                <div>
                    <label>Personal Hygiene</label>

                    <div class="grid grid-cols-2 gap-4 mt-2">

                        <div>
                            Mandi
                            <input type="number" name="mandi" class="input w-20"> kali/hari
                        </div>

                        <div>
                            Gosok gigi
                            <input type="number" name="gosok_gigi" class="input w-20"> kali/hari
                        </div>

                        <div>
                            Keramas
                            <input type="number" name="keramas" class="input w-20"> kali/minggu
                        </div>

                        <div>
                            Ganti baju
                            <input type="number" name="ganti_baju" class="input w-20"> kali/hari
                        </div>

                        <div>
                            Ganti celana dalam
                            <input type="number" name="ganti_cd" class="input w-20"> kali/hari
                        </div>

                    </div>

                </div>


                <div>
                    <label>Aktivitas seksual selama hamil</label>
                    <input type="text" name="aktivitas_seksual" class="input w-full">
                </div>


                <div>
                    <label>Pola kebiasaan</label>
                    <input type="text" name="pola_kebiasaan" class="input w-full">
                </div>

            </div>
            <br>

            <hr class="my-6">
            {{-- =================Riwayat Sosial Budaya, Pengetahuan dan Spiritual ================= --}}
            <label class="font-semibold">11. Riwayat Sosial Budaya, Pengetahuan dan Spiritual</label>

            <div class="grid grid-cols-2 gap-8 mb-6">

                <div class="space-y-3">
                    <input type="text" name="kehamilan_ini" placeholder="Kehamilan Ini" class="input">

                    <div class="col-span-2">
                        <label>Kondisi Ibu dengan Kehamilan</label>
                        <select name="kondisi_ibu_kehamilan" class="w-full border rounded p-2">
                            <option value="Senang">Senang dengan Kehamilanya</option>
                            <option value="Tidak_senang">Tidak Senang dengan Kehamilanya</option>
                        </select>
                    </div>
                    <input type="text" name="tradisi" placeholder="Tradisi" class="input">
                    <input type="text" name="spiritual" placeholder="Spiritual" class="input">
                    <input type="text" name="pengetahuan" placeholder="Pengetahuan" class="input">
                </div>
            </div>


            <hr class="my-6">

            {{-- ================= DATA OBYEKTIF ================= --}}
            <h3 class="text-lg font-bold text-purple-700 mb-4">
                B. Data Obyektif
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                {{-- ================= PEMERIKSAAN UMUM ================= --}}
                <div class="space-y-3">

                    <h4 class="font-semibold">1. Pemeriksaan Umum</h4>

                    <input type="text" name="kesadaran" placeholder="Kesadaran" class="input">

                    <div class="flex items-center gap-2">
                        <input type="text" name="tekanan_darah" placeholder="Tekanan Darah" class="input">
                        <span class="text-sm">mmHg</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="text" name="denyut_nadi" placeholder="Denyut Nadi" class="input">
                        <span class="text-sm">x/menit</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="text" name="pernafasan" placeholder="Pernafasan" class="input">
                        <span class="text-sm">x/menit</span>
                    </div>

                </div>


                <div class="space-y-3">

                    <br>

                    <div class="flex items-center gap-2">
                        <input type="text" name="suhu" placeholder="Suhu Tubuh" class="input">
                        <span class="text-sm">°C</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="text" name="lila" placeholder="LILA" class="input">
                        <span class="text-sm">cm</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="text" name="berat_tinggi_badan" placeholder="Berat/Tinggi Badan" class="input">
                        <span class="text-sm">kg/cm</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="text" name="berat_sebelum_hamil" placeholder="Berat Sebelum Hamil" class="input">
                        <span class="text-sm">kg</span>
                    </div>

                </div>
            </div>

            <hr class="my-6">

            <div class="space-y-3">
                {{-- ================= PEMERIKSAAN FISIK ================= --}}
                <h4 class="font-semibold">2. Pemeriksaan Fisik</h4>

                <h5>A. Kepala</h5>
                <textarea name="kepala" placeholder="Kepala" class="w-full border rounded p-2 mb-4"></textarea>
                <h5>B. Muka</h5>
                <textarea name="muka" placeholder="Muka" class="w-full border rounded p-2 mb-4"></textarea>
                <h5>C. Mata</h5>
                <textarea name="mata" placeholder="Mata" class="w-full border rounded p-2 mb-4"></textarea>
                <h5>D. Hidung</h5>
                <textarea name="hidung" placeholder="Hidung" class="w-full border rounded p-2 mb-4"></textarea>
                <h5>E. Mulut</h5>
                <textarea name="mulut" placeholder="Mulut" class="w-full border rounded p-2 mb-4"></textarea>
                <h5>F. Leher</h5>
                <textarea name="leher" placeholder="Leher" class="w-full border rounded p-2 mb-4"></textarea>
                <h5>G. Dada</h5>
                <textarea name="dada" placeholder="Dada" class="w-full border rounded p-2 mb-4"></textarea>
                <h5>H. Abdomen</h5>
                <textarea name="abdomen" placeholder="Abdomen" class="w-full border rounded p-2"></textarea>
                <input type="text" name="leopold_i" placeholder="Leopold I" class="input">
                <input type="text" name="leopold_ii" placeholder="Leopold II" class="input">
                <input type="text" name="leopold_iii" placeholder="Leopold III" class="input">
                <input type="text" name="leopold_iv" placeholder="Leopold IV" class="input">
                <div class="flex items-center gap-2">
                    <input type="text" name="tbj" placeholder="TBJ" class="input"> gram
                </div>
                <div class="flex items-center gap-2">
                    <input type="text" name="djj" placeholder="DJJ" class="input"> x/Menit
                </div>
                <h5>I. Genetalia</h5>
                <textarea name="genetalia" placeholder="Genetalia" class="w-full border rounded p-2 mb-4"></textarea>
                <h5>J. Anus</h5>
                <textarea name="anus" placeholder="Anus" class="w-full border rounded p-2 mb-4"></textarea>
                <h5>K. Ekstemitas</h5>
                <textarea name="ekstemitas" placeholder="Ekstemitas" class="w-full border rounded p-2 mb-4"></textarea>
            </div>

        </div>

        <hr class="my-6">


        <div class="grid md:grid-cols-2 gap-4 mb-4">

            <div class="space-y-3">

                <h4 class="font-semibold">3. Pemeriksaan Panggul Luar</h4>

                <div class="flex items-center gap-2">
                    <label class="w-40">Distansia Spinarum</label>
                    <input type="text" name="distansia_sinarum" class="input">
                    <span class="text-sm">cm</span>
                </div>

                <div class="flex items-center gap-2">
                    <label class="w-40">Distansia Kristarum</label>
                    <input type="text" name="distansia_kristarum" class="input">
                    <span class="text-sm">cm</span>
                </div>

            </div>


            <div class="space-y-3">

                <br>

                <div class="flex items-center gap-2">
                    <label class="w-40">Konjugata Eksterna</label>
                    <input type="text" name="konjugata_eksterna" class="input">
                    <span class="text-sm">cm</span>
                </div>

                <div class="flex items-center gap-2">
                    <label class="w-40">Lingkar Panggul</label>
                    <input type="text" name="lingkar_panggul" class="input">
                    <span class="text-sm">cm</span>
                </div>

            </div>

        </div>


        <hr class="my-6">

        {{-- ================= PEMERIKSAAN PENUNJANG ================= --}}

        <label class="font-semibold">4. Pemeriksaan Penunjang / Laboratorium</label>

        <div class="grid grid-cols-2 gap-4 mt-2 mb-4">

            <div>
                <label class="text-sm">Tanggal</label>
                <input type="date"
                    name="lab_tanggal"
                    value="{{ old('lab_tanggal') }}"
                    class="w-full border rounded p-2">
            </div>

            <div>
                <label class="text-sm">Tempat</label>
                <input type="text"
                    name="lab_tempat"
                    value="{{ old('lab_tempat') }}"
                    class="w-full border rounded p-2">
            </div>

        </div>

        <div class="mb-6">

            <label class="text-sm">Hasil</label>

            <textarea
                name="lab_hasil"
                rows="3"
                class="w-full border rounded p-2"
                placeholder="Hasil pemeriksaan laboratorium">{{ old('lab_hasil') }}</textarea>

        </div>
        {{-- ================= ANALISIS & PENATALAKSANAAN ================= --}}
        <h3 class="text-lg font-bold text-purple-700 mb-4">
            C. Analisis Data
        </h3>
        <h4 class="font-semibold">1. Diagnosis</h4>
        <textarea name="diagnosis" class="w-full border rounded p-2 mb-4"
            placeholder="Diagnosis"></textarea>
        <h4 class="font-semibold">2. Masalah Potensial</h4>
        <textarea name="masalah_potensial" class="w-full border rounded p-2 mb-4"
            placeholder="Masalah Potensial"></textarea>
        <h4 class="font-semibold">3. Kebutuhan Segera</h4>
        <textarea name="kebutuhan_segera" class="w-full border rounded p-2 mb-4"
            placeholder="Kebutuhan Segera"></textarea>

        <hr class="my-6">
        <h3 class="text-lg font-bold text-purple-700 mb-4">
            D. Penatalaksanaan
        </h3>

        <div class="grid md:grid-cols-2 gap-4 mb-6">

            <div>
                <label class="font-semibold">Jam</label>
                <input type="time" name="jam_penatalaksanaan" class="input">
            </div>

            <div>
                <label class="font-semibold">Tanggal</label>
                <input type="date" name="tanggal_penatalaksanaan" class="input">
            </div>

        </div>

        <div class="overflow-x-auto mb-4">

            <table class="min-w-[900px] border border-collapse text-[11px]">


                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-2 py-1 w-10">No</th>
                        <th class="border px-2 py-1">Penatalaksanaan</th>
                        <th class="border px-2 py-1 w-20">Aksi</th>
                    </tr>
                </thead>

                <tbody id="penatalaksanaan-table">

                    <tr>
                        <td class="border text-center">1</td>
                        <td class="border p-1">
                            <input type="text" name="penatalaksanaan[]" class="w-full border rounded p-2">
                        </td>
                        <td class="border text-center">
                            <button type="button" onclick="removeRow(this)" class="bg-red-500 text-white px-2 py-1 rounded">
                                Hapus
                            </button>
                        </td>
                    </tr>

                </tbody>

            </table>

            <button type="button" onclick="addRow()"
                class="bg-purple-600 text-white px-3 py-1 rounded mt-3">
                + Tambah Penatalaksanaan
            </button>

        </div>

    </div>
    <div class="mt-8 text-right">
        <button class="bg-purple-600 text-white px-6 py-2 rounded">
            Submit Laporan
        </button>
    </div>

    </form>

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
        if (table.rows.length > 3) {
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
<button type="button" onclick="removeRow(this)" class="bg-red-500 text-white px-2 py-1 rounded">
Hapus
</button>
</td>

</tr>
`;

        table.insertAdjacentHTML('beforeend', row);

    }

    function removeRow(btn) {

        let row = btn.parentNode.parentNode;

        row.remove();

        reNumber();

    }

    function reNumber() {

        let table = document.getElementById("penatalaksanaan-table");

        for (let i = 0; i < table.rows.length; i++) {

            table.rows[i].cells[0].innerText = i + 1;

        }

    }
</script>

<style>
    .input {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 3px 6px;
    }
</style>

</div