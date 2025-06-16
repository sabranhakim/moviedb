@extends('layouts.main')

@section('content')
    <div class="bg-black text-white min-h-screen py-8 px-4">
        <div class="max-w-7xl mx-auto">

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="mb-6">
                    <div class="bg-green-500 text-white px-4 py-3 rounded-lg shadow-md flex items-center justify-between">
                        <span>{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-white hover:text-gray-200 font-bold ml-4">
                            &times;
                        </button>
                    </div>
                </div>
            @endif

            <!-- Section: Top 10 -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-yellow-400 mb-6">🔥 Top 10 on IMDb this week</h2>

                <!-- Grid 2 Columns -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($favoriteMovies as $index => $movie)
                        <div class="bg-zinc-900 rounded-lg shadow-md flex flex-col md:flex-row overflow-hidden">
                            <!-- Cover Image -->
                            <div class="relative md:w-1/3">
                                <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}"
                                     class="w-full h-full object-cover md:h-72">
                                <div class="absolute top-2 left-2 bg-yellow-500 text-black text-xs px-2 py-1 rounded font-bold">
                                    {{ $index + 1 }}
                                </div>
                            </div>

                            <!-- Info -->
                            <div class="p-4 flex flex-col justify-between md:w-2/3">
                                <div>
                                    <h3 class="text-xl font-semibold mb-1">{{ $movie->title }}</h3>
                                    <span class="text-yellow-400 text-sm mb-2 inline-block">⭐
                                        {{ $movie->rating ?? 'N/A' }}</span>
                                    <p class="text-lg text-gray-300 mb-4 line-clamp-3">
                                        {{ Str::words($movie->synopsis, 15, '...') ?? 'No synopsis available.' }}
                                    </p>
                                    <a href="/movie/{{ $movie->id }}/{{ $movie->slug }}" class="btn btn-primary">Read more</a>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    <a href="/movie/{{ $movie->id }}/{{ $movie->slug }}"
                                       class="bg-zinc-700 hover:bg-zinc-600 text-xs px-4 py-2 rounded text-white">
                                        Details
                                    </a>
                                    <a href="#"
                                       class="bg-zinc-800 hover:bg-zinc-700 text-xs px-4 py-2 rounded text-white">
                                        ▶ Trailer
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
