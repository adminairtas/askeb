<div>

    <h2 class="text-xl font-bold mb-6 text-center">
        ISTEK ADMIN
    </h2>

    <ul class="space-y-2 text-sm">

        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-2 p-2 rounded hover:bg-purple-700 transition">
                📊 Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.mahasiswa.index') }}"
                class="flex items-center gap-2 p-2 rounded hover:bg-purple-700 transition">
                🎓 Mahasiswa
            </a>
        </li>

        <li>
            <a href="{{ route('admin.dosen.index') }}"
                class="flex items-center gap-2 p-2 rounded hover:bg-purple-700 transition">
                👨‍🏫 Dosen
            </a>
        </li>

        <li>
            <a href="{{ route('admin.askeb.index') }}"
                class="flex items-center gap-2 p-2 rounded hover:bg-purple-700 transition">
                📁 Data Askeb
            </a>
        </li>

        <li>
            <a href="{{ route('admin.users.index') }}"
                class="flex items-center gap-2 p-2 rounded hover:bg-purple-700 transition">
                👤 Users
            </a>
        </li>

        <li class="pt-4 border-t border-purple-700">

            <div class="text-xs text-gray-300 mb-2">
                {{ auth()->user()->name }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-1.5 rounded text-sm">
                    Logout
                </button>
            </form>

        </li>

    </ul>

</div>