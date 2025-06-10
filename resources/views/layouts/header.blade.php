<header class="bg-black text-white shadow">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('movies.index') }}"
            class="text-2xl font-bold tracking-wide text-white hover:text-yellow-300 transition duration-200">
            MovieDB
        </a>

        @auth
            <!-- Username -->
            <a href="#" class="text-2xl font-bold tracking-wide text-white">
                {{ Auth::user()->name }}
            </a>

            <!-- Navigation (Desktop) -->
            <nav class="space-x-6 hidden md:flex items-center">
                <a href="{{ route('movies.index') }}"
                    class="font-semibold hover:text-yellow-300 transition duration-200">Home</a>
                <a href="{{ route('createMovie') }}" class="font-semibold hover:text-yellow-300 transition duration-200">Add
                    Movie</a>
                @can('listMovie')
                    <a href="{{ route('listMovie') }}" class="font-semibold hover:text-yellow-300 transition duration-200">List
                        Movie</a>
                @endcan
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="font-bold hover:text-red-700 transition duration-150">Logout</button>
                </form>
            </nav>
        @else
            <!-- Navigation (Desktop) for Guest -->
            <nav class="space-x-6 hidden md:flex items-center">
                <a href="{{ route('login') }}" class="font-bold hover:text-green-400 transition duration-200">Login</a>
            </nav>
        @endauth

        <!-- Mobile menu button -->
        <button id="menu-toggle" aria-expanded="false" aria-controls="mobile-menu"
            class="md:hidden focus:outline-none text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2">
        @auth
            <a href="{{ route('movies.index') }}"
                class="block font-semibold text-white hover:text-yellow-300 transition duration-200">Home</a>
            <a href="{{ route('createMovie') }}"
                class="block font-semibold text-white hover:text-yellow-300 transition duration-200">Add Movie</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="block font-semibold text-white hover:text-yellow-300 transition duration-200">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="block font-semibold text-white hover:text-yellow-300 transition duration-200">Login</a>
        @endauth
    </div>

    <script>
        const toggleBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        toggleBtn?.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            const expanded = toggleBtn.getAttribute('aria-expanded') === 'true';
            toggleBtn.setAttribute('aria-expanded', !expanded);
        });
    </script>
</header>
