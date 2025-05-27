@extends('layouts.main')

@section('title', 'Detail Movie')

@section('content')
<div class="bg-black text-white min-h-screen py-12 px-6">
    <h2 class="text-center text-4xl font-bold text-yellow-400">Detail Movie</h2>
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-start mt-5">

        <!-- Cover Image -->
        <div>
            <img src="{{ asset('storage/'. $movie->cover_image) }}" alt="{{ $movie->title }}"
                 class="w-full h-auto rounded-lg shadow-lg object-cover">
        </div>

        <!-- Movie Info -->
        <div class="space-y-6">
            <div>
                <h1 class="text-3xl font-bold text-yellow-400">{{ $movie->title }}</h1>
                <p class="text-sm text-gray-400 mt-1">Slug: <span class="text-gray-500">{{ $movie->slug }}</span></p>
                <p class="text-sm text-gray-400 mt-1">Year: <span class="text-white">{{ $movie->year }}</span></p>
                <p class="text-sm text-gray-400 mt-1">
                    Category:
                    <span class="text-white">
                        {{ $movie->category->category_name ?? 'Unknown Category' }}
                    </span>
                </p>
                <p class="text-sm text-gray-400 mt-1">
                    Actors:
                    <span class="text-white">
                        {{ $movie->actors }}
                    </span>
                </p>
            </div>

            <div class="flex items-center gap-2">
                <span class="text-yellow-300 text-lg">⭐ {{ $movie->rating ?? 'N/A' }}</span>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-white mb-2">Synopsis</h2>
                <p class="text-gray-300 leading-relaxed">
                    {{ $movie->synopsis ?? 'No synopsis available.' }}
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                @if ($movie->trailer_url)
                <a href="{{ $movie->trailer_url }}" target="_blank"
                   class="bg-red-600 hover:bg-red-500 px-4 py-2 rounded text-sm text-white font-medium transition">
                    ▶ Watch Trailer
                </a>
                @endif

                <a href="{{ route('movies.index') }}"
                   class="bg-zinc-700 hover:bg-zinc-600 px-4 py-2 rounded text-sm text-white font-medium transition">
                    ← Back to List
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
