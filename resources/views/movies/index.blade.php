@extends('layouts.main')

@section('content')
<div class="bg-black text-white min-h-screen py-8 px-4">
    <div class="max-w-7xl mx-auto">

        <!-- Section: Top 10 -->
        <div class="mb-8">
            <h2 class="text-xl font-bold text-yellow-400 mb-2">🔥 Top 10 on IMDb this week</h2>
            <div class="flex overflow-x-auto space-x-4 pb-4 scrollbar-hide">
                @foreach ($topMovies as $index => $movie)
                <div class="flex-none w-48 bg-zinc-900 rounded-lg shadow-md">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}" class="w-full scale-75 h-72 object-cover rounded-t-lg">
                        <div class="absolute top-1 left-1 bg-yellow-500 text-black text-xs px-2 py-1 rounded font-bold">{{ $index + 1 }}</div>
                    </div>
                    <div class="p-3">
                        <div class="flex items-center gap-1 mb-1">
                            <span class="text-yellow-400 text-sm">⭐ {{ $movie->rating ?? 'N/A' }}</span>
                        </div>
                        <h3 class="text-sm font-semibold truncate">{{ $movie->title }}</h3>
                        <div class="mt-2 flex flex-col gap-1">
                            <button class="bg-zinc-700 hover:bg-zinc-600 text-xs py-1 rounded">
                                Details
                            </button>
                            <button class="bg-zinc-800 hover:bg-zinc-700 text-xs py-1 rounded">
                                ▶ Trailer
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
