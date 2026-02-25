<x-app-layout>
    <div class="min-h-screen bg-purple-50 p-6">

        <div class="max-w-5xl mx-auto">

            <div class="bg-purple-800 text-white p-6 rounded-lg shadow-lg">
                <h1 class="text-2xl font-bold">
                    DASHBOARD DOSEN
                </h1>
                <p class="text-sm">
                    E-ASKEB KEHAMILAN – PRODI KEBIDANAN
                </p>
            </div>

            <div class="mt-6">
                Selamat datang, {{ auth()->user()->name }}
            </div>

        </div>

    </div>
</x-app-layout>