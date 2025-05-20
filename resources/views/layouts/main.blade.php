<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css') {{-- Tailwind via Vite --}}
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    @include('layouts.header')

    <div class="flex flex-1">
        {{-- @include('layouts.sidebar') --}}

        <main class="flex-1 bg-gray-50">
            @yield('content')
        </main>
    </div>

    <footer class="bg-black text-center text-sm text-white py-4">
        © {{ date('Y') }} Sabran Hakim. All rights reserved.
    </footer>

</body>
</html>
