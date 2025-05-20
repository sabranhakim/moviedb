@extends('layouts.main')

@section('title', 'Edit Movie')

@section('content')
<h2 class="text-2xl font-bold mb-6">✏️ Edit Movie</h2>

<form action="{{ route('movies.update', $movie->id) }}" method="POST" class="bg-white p-6 rounded shadow max-w-xl">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-1 font-medium">Title</label>
        <input type="text" name="title" value="{{ $movie->title }}" class="w-full border px-3 py-2 rounded" required>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-medium">Slug</label>
        <input type="text" name="slug" value="{{ $movie->slug }}" class="w-full border px-3 py-2 rounded" required>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-medium">Category</label>
        <select name="category_id" class="w-full border px-3 py-2 rounded" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $movie->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-medium">Year</label>
        <input type="number" name="year" value="{{ $movie->year }}" min="1900" max="{{ date('Y') }}" class="w-full border px-3 py-2 rounded" required>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-medium">Synopsis</label>
        <textarea name="synopsis" class="w-full border px-3 py-2 rounded" rows="4">{{ $movie->synopsis }}</textarea>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-medium">Actors</label>
        <textarea name="actors" class="w-full border px-3 py-2 rounded" rows="2">{{ $movie->actors }}</textarea>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-medium">Cover Image</label>
        <input type="text" name="cover_image" value="{{ $movie->cover_image }}" class="w-full border px-3 py-2 rounded">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
</form>
@endsection
