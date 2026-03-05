<x-app-layout>

    <div class="min-h-screen bg-purple-50 p-6">

        <div class="max-w-6xl mx-auto">

            <!-- HEADER -->
            <div class="bg-purple-700 text-white p-6 rounded-xl shadow-lg">
                <h1 class="text-2xl font-bold">
                    E-ASKEB KEHAMILAN
                </h1>
                <p class="text-sm">
                    PRODI KEBIDANAN
                </p>
            </div>

            <!-- WELCOME -->
            <div class="mt-6">
                <h2 class="text-lg font-semibold text-purple-700">
                    Selamat Datang, {{ auth()->user()->name }}
                </h2>
            </div>

            <!-- MENU CARD -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- BUAT ASKEB -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="font-bold text-purple-700 text-lg">
                        Buat ASKEB Baru
                    </h3>
                    <p class="text-gray-600 text-sm mt-2">
                        Mulai mengisi ASKEB KEHAMILAN baru dan kirim ke dosen pembimbing.
                    </p>

                    <a href="{{ route('askeb.create') }}"
                       class="mt-4 inline-block bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
                        + Buat ASKEB KEHAMILAN
                    </a>
                </div>

                <!-- DAFTAR ASKEB -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="font-bold text-purple-700 text-lg">
                        ASKEB Saya
                    </h3>
                    <p class="text-gray-600 text-sm mt-2">
                        Lihat status ASKEB (Review, Revisi, ACC).
                    </p>

                    <a href="{{ route('askeb.index') }}"
                       class="mt-4 inline-block bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg">
                        Lihat Daftar ASKEB
                    </a>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>