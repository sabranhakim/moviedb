@extends('layouts.main')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-8 text-center text-yellow-400">🎬 Add New Movie</h1>

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-zinc-900 p-6 rounded-lg shadow-lg text-white">
        @csrf

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-semibold mb-1">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="w-full px-4 py-2 rounded-lg bg-zinc-800 border @error('title') border-red-500 @else border-zinc-700 @enderror focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Synopsis -->
        <div>
            <label for="synopsis" class="block text-sm font-semibold mb-1">Synopsis</label>
            <textarea name="synopsis" id="synopsis" rows="4"
                class="w-full px-4 py-2 rounded-lg bg-zinc-800 border @error('synopsis') border-red-500 @else border-zinc-700 @enderror focus:outline-none focus:ring-2 focus:ring-yellow-500">{{ old('synopsis') }}</textarea>
            @error('synopsis')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div>
            <label for="category_id" class="block text-sm font-semibold mb-1">Category</label>
            <select name="category_id" id="category_id"
                class="w-full px-4 py-2 rounded-lg bg-zinc-800 border @error('category_id') border-red-500 @else border-zinc-700 @enderror text-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Year -->
        <div>
            <label for="year" class="block text-sm font-semibold mb-1">Release Year</label>
            <select name="year" id="year"
                class="w-full px-4 py-2 rounded-lg bg-zinc-800 border @error('year') border-red-500 @else border-zinc-700 @enderror text-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
                <option value="">-- Select Year --</option>
                @for ($i = date('Y'); $i >= 1980; $i--)
                    <option value="{{ $i }}" {{ old('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            @error('year')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actors -->
        <div>
            <label for="actors" class="block text-sm font-semibold mb-1">Actors</label>
            <input type="text" name="actors" id="actors" value="{{ old('actors') }}"
                class="w-full px-4 py-2 rounded-lg bg-zinc-800 border @error('actors') border-red-500 @else border-zinc-700 @enderror focus:outline-none focus:ring-2 focus:ring-yellow-500">
            @error('actors')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Cover Image -->
        <div>
            <label for="cover_image" class="block text-sm font-semibold mb-1">Cover Image</label>
            <input type="file" name="cover_image" id="cover_image" accept="image/*"
                class="w-full px-4 py-2 rounded-lg bg-zinc-800 border @error('cover_image') border-red-500 @else border-zinc-700 @enderror focus:outline-none focus:ring-2 focus:ring-yellow-500">
            @error('cover_image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-6 py-2 rounded-lg transition duration-200">
                Save Movie
            </button>
        </div>
    </form>
</div>
@endsection
