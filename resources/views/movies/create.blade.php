@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8 ">
    <h1 class="text-2xl font-bold mb-6">Add Movie</h1>
    
    <form action="{{ route('movies.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" required
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-indigo-300" />
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" required
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-indigo-300"></textarea>
        </div>

        <!-- Release Year -->
        <div>
            <label for="release_year" class="block text-sm font-medium text-gray-700">Release Year</label>
            <input type="number" name="release_year" id="release_year" required min="1800" max="{{ date('Y') }}"
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-indigo-300" />
        </div>

        <!-- Rating -->
        <div>
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating (0 - 10)</label>
            <input type="number" name="rating" id="rating" step="0.1" min="0" max="10" required
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-indigo-300" />
        </div>

        <!-- Genre -->
        <div>
            <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
            <input type="text" name="genre" id="genre" required
                class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-indigo-300" />
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit"
                class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">Save Movie</button>
        </div>
    </form>
</div>
@endsection
