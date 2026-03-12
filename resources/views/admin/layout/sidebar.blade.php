<div class="w-64 bg-gray-900 text-white min-h-screen p-4">

    <h2 class="text-xl font-bold mb-6">ADMIN PANEL</h2>

    <ul class="space-y-3">

        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="block p-2 rounded hover:bg-gray-700">
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.mahasiswa.index') }}"
                class="block p-2 rounded hover:bg-gray-700">
                Mahasiswa
            </a>
        </li>

        <li>
            <a href="{{ route('admin.dosen.index') }}"
                class="block p-2 rounded hover:bg-gray-700">
                Dosen
            </a>
        </li>

        <li>
            <a href="{{ route('admin.askeb.index') }}"
                class="block p-2 rounded hover:bg-gray-700">
                Data Askeb
            </a>
        </li>

        <li>
            <a href="{{ route('admin.users.index') }}"
                class="block p-2 rounded hover:bg-gray-700">
                Users
            </a>
        </li>
        
        <li>
<div class="flex items-center gap-3">

    <span class="text-sm text-gray-700">
        {{ auth()->user()->name }}
    </span>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button
            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-sm">
            Logout
        </button>

    </form>

</div>
        </li>
    </ul>

</div>