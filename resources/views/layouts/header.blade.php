<header class="bg-black text-white shadow">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo atau Judul -->
        <a href="{{ route('movies.index') }}" class="text-2xl font-bold tracking-wide text-red-600 hover:text-red-500">
            MovieDB
        </a>

        <!-- Navigation -->
        <nav class="space-x-6 hidden md:block">
            <a href="{{ route('movies.index') }}" class="hover:text-red-500 transition">Home</a>
            <a href="{{ route('movies.create') }}" class="hover:text-red-500 transition">Add Movie</a>
            {{-- Tambah link tambahan jika perlu --}}
        </nav>

        <!-- Mobile menu placeholder (opsional) -->
        <div class="md:hidden">
            <button id="menu-toggle" class="focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Optional: Mobile dropdown menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2">
        <a href="{{ route('movies.index') }}" class="block text-white hover:text-red-500">Home</a>
        <a href="{{ route('movies.create') }}" class="block text-white hover:text-red-500">Add Movie</a>
    </div>

    <script>
        // Simple JS toggle for mobile menu
        document.getElementById('menu-toggle')?.addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</header>
