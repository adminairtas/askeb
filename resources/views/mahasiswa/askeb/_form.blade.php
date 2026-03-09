<h2 class="text-2xl font-bold mb-6 text-purple-700">
    Form Laporan ANC
</h2>

{{-- ================= HEADER ================= --}}
<div class="grid grid-cols-2 gap-6 mb-8">

    <div>
        <label class="font-semibold">Asuhan Kebidanan Pada</label>
        <textarea name="asuhan_pada" class="w-full border rounded p-2"></textarea>
    </div>

    <div class="grid grid-cols-2 gap-4">
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

<div class="grid grid-cols-2 gap-8 mb-6">

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

<div class="my-6">
    <label class="font-semibold">2. Keluhan Utama</label>
    <textarea name="keluhan_utama" class="w-full border rounded p-2"></textarea>
</div>

<div class="my-6">

    {{-- ================= RIWAYAT MENSTRUASI ================= --}}
    <label class="font-semibold">3. Riwayat Menstruasi</label>

    <div class="grid grid-cols-2 gap-6 mb-6">
        <input type="text" name="menarche" placeholder="Menarche (th)" class="input">
        <input type="text" name="lama_haid" placeholder="Lama haid (hari)" class="input">
        <input type="text" name="jumlah_haid" placeholder="Jumlah (cc)" class="input">
        <input type="text" name="karakteristik_haid" placeholder="Karakteristik" class="input">

        <div class="col-span-2">
            <label>Siklus haid</label>
            <select name="siklus_haid" class="w-full border rounded p-2">
                <option value="Teratur">Teratur</option>
                <option value="Tidak Teratur">Tidak Teratur</option>
            </select>
        </div>
    </div>

    {{-- ================= RIWAYAT PERKAWINAN ================= --}}
    <label class="font-semibold">4. Riwayat Perkawinan</label>

    <div class="grid grid-cols-3 gap-6 mb-6">
        <input type="text" name="usia_pertama_menikah" placeholder="Usia Pertama Menikah ...th" class="input">
        <input type="text" name="lama_menikah" placeholder="Lama Menikah ...th" class="input">
        <input type="text" name="status_pernikahan" placeholder="Status Pernikahan" class="input">
    </div>

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


    {{-- ================= RIWAYAT KONTRASEPSI ================= --}}
    <label class="font-semibold">6. Riwayat Kontrasepsi</label>
    <h5>Sebelum Hamil Ibu :</h5>
    <div class="grid grid-cols-3 gap-6 mb-6">
        <input type="text" name="sebelum_hamil_ibu" class="input">
    </div>

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

        <div class="mt-4 space-y-3">

            <p>
                Selama hamil ibu memeriksakan kehamilan
                <input type="text" name="jumlah_periksa" class="input w-20 inline">
                kali, Status imunisasi (TT) <input type="text" name="status_imunisasi_tt" class="input w-24 inline">, jumlah tablet MMS yang telah diminum <input type="text" name="jumlah_mms" class="input w-24 inline">
                butir. Merasakan gerak janin usia <input type="text" name="gerak_janin_usia" class="input w-24 inline"> minggu/bulan. Keluhan yang pernah dirasakan selama kehamilan sebelumnya
                <input type="text" name="keluhan_hamil" class="input w-64 inline"> Obat yang didapat oleh ibu <input type="text" name="obat_didapat" class="input w-64 inline">.
            </p>
    </div>
    <br>


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

    {{-- ================= POLA FUNGSIONAL KESEHATAN ================= --}}
    <label class="font-semibold">10. Pola Fungsional Kesehatan</label>

    <div class="mb-6">
        <textarea name="pola_fungsional_kesehatan" placeholder="Pola Fungsional Kesehatan"
            class="w-full border rounded p-2"></textarea>
    </div>

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
            <input type="text" name="Tradisi" placeholder="Tradisi" class="input">
            <input type="text" name="Spiritual" placeholder="Spiritual" class="input">
            <input type="text" name="Pengetahuan" placeholder="Pengetahuan" class="input">
        </div>
    </div>


    <hr class="my-6">

    {{-- ================= DATA OBYEKTIF ================= --}}
    <h3 class="text-lg font-bold text-purple-700 mb-4">
        B. Data Obyektif
    </h3>

    <div class="grid grid-cols-2 gap-4 mb-4">

        {{-- ================= pEMERIKSAAN UMUM ================= --}}
        <div class="space-y-3">

            <h4 class="font-semibold">1. Pemeriksaan Umum</h4>
            <input type="text" name="kesadaran" placeholder="Kesadaran" class="input">
            <input type="text" name="tekanan_darah" placeholder="Tekanan Darah" class="input">
            <input type="text" name="denyut_nadi" placeholder="Denyut Nadi" class="input">
            <input type="text" name="pernafasan" placeholder="Pernafasan" class="input">
        </div>
        <div class="space-y-3">
            <br>
            <input type="text" name="suhu" placeholder="Suhu Tubuh" class="input">
            <input type="text" name="lila" placeholder="Lila" class="input">
            <input type="text" name="berat_tinggi_badan" placeholder="Berat/Tinggi Badan" class="input">
            <input type="text" name="berat_sebelum_hamil" placeholder="Berat Sebelum Hamil" class="input">
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
        <input type="text" name="tbj" placeholder="TBJ" class="input">
        <input type="text" name="djj" placeholder="DJJ" class="input">
        <h5>I. Genetalia</h5>
        <textarea name="genetalia" placeholder="Genetalia" class="w-full border rounded p-2 mb-4"></textarea>
        <h5>J. Anus</h5>
        <textarea name="anus" placeholder="Anus" class="w-full border rounded p-2 mb-4"></textarea>
        <h5>K. Ekstemitas</h5>
        <textarea name="ekstemitas" placeholder="Ekstemitas" class="w-full border rounded p-2 mb-4"></textarea>
    </div>

</div>

<div class="grid grid-cols-2 gap-4 mb-4">

    {{-- ================= PEMERIKSAAN PANGGUL LUAR ================= --}}
    <div class="space-y-3">

        <h4 class="font-semibold">3. Pemeriksaan Panggul Luar</h4>
        <input type="text" name="distansia_sinarum" placeholder="Distansia spinarum " class="input">
        <input type="text" name="distansia_kristarum" placeholder="Distansia kristarum " class="input">
    </div>
    <div class="space-y-3">
        <br>
        <input type="text" name="konjugata_eksterna" placeholder="Konjugata eksterna" class="input">
        <input type="text" name="lingkar_panggul" placeholder="Lingkar panggul" class="input">
    </div>
</div>

<hr class="my-6">

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

<h3 class="text-lg font-bold text-purple-700 mb-4">
    D. Penatalaksanaan
</h3>

<h4 class="font-semibold">JAM :</h4>
<input type="time" name="jam_penatalaksanaan" class="input mb-4">
<div class="grid grid-cols-2 gap-8 mb-6">
    <div class="space-y-3">
        <input type="text" name="penatalaksanaan1" placeholder="Penatalaksana 1" class="input">
        <input type="text" name="penatalaksanaan2" placeholder="Penatalaksana 2" class="input">
        <input type="text" name="penatalaksanaandst" placeholder="Penatalaksana Dst" class="input">
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