<x-app-layout>

    <div class="min-h-screen bg-purple-100 p-6">

        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="bg-purple-900 text-white p-6 rounded-xl shadow-lg">
                <h1 class="text-2xl font-bold">
                    ADMIN PANEL
                </h1>
                <p class="text-sm">
                    E-ASKEB KEHAMILAN
                </p>
                <p class="text-sm">
                    PRODI KEBIDANAN
                </p>
            </div>

            <!-- Welcome -->
            <div class="mt-6 bg-white p-6 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-purple-700">
                    Selamat Datang, {{ auth()->user()->name }}
                </h2>
                <p class="text-gray-600 mt-2">
                    Kelola pengguna dan sistem E-ASKEB.
                </p>
            </div>

        </div>

    </div>

</x-app-layout>