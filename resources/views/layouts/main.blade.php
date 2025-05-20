<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Moviedb')</title>
    @vite('resources/css/app.css') {{-- Tailwind via Vite --}}
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    {{-- Header --}}
    @include('layouts.header')

    {{-- Main content area --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-black text-center text-sm text-white py-4">
        © {{ date('Y') }} Sabran Hakim. All rights reserved.
    </footer>

</body>
</html>
