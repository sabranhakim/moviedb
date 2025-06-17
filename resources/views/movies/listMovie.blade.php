@extends('layouts.main')

@section('content')
    <div class="bg-black text-white min-h-screen py-8 px-4">
        <div class="max-w-7xl mx-auto overflow-x-auto rounded-lg shadow-lg ">

            <div class="mb-6 text-right">
                <a href="{{ route('createMovie') }}"
                    class="inline-block bg-yellow-400 hover:bg-yellow-300 text-black font-semibold px-6 py-2 rounded shadow transition duration-200">
                    + Add Movie
                </a>
            </div>
            <table class="min-w-full divide-y divide-gray-700 text-sm text-left text-white">
                <thead class="bg-zinc-800 text-xs uppercase text-yellow-400">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Year</th>
                        <th class="px-4 py-3">Actors</th>
                        <th class="px-4 py-3">Cover</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 bg-zinc-900">
                    @foreach ($movies as $index => $movie)
                        <tr class="hover:bg-zinc-800">
                            <td class="px-4 py-2 align-middle">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 align-middle">{{ $movie->title }}</td>
                            <td class="px-4 py-2 align-middle">{{ $movie->category->category_name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 align-middle">{{ $movie->year }}</td>
                            <td class="px-4 py-2 align-middle">{{ $movie->actors }}</td>
                            <td class="px-4 py-2 align-middle">
                                @if ($movie->cover_image)
                                    <img src="{{ asset('storage/' . $movie->cover_image) }}" alt="{{ $movie->title }}"
                                        class="w-12 h-16 object-cover rounded shadow">
                                @else
                                    <span class="text-gray-500">No image</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 align-middle space-x-3 whitespace-nowrap">
                                <a href="{{ route('editMovie', $movie->id) }}"
                                    class="text-yellow-400 hover:text-yellow-300 font-semibold">
                                    Edit
                                </a>
                                <form action="{{ route('deleteMovie', $movie->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400 font-semibold"
                                        onclick="return confirm('Delete this movie?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($movies->isEmpty())
                        <tr>
                            <td colspan="9" class="px-4 py-4 text-center text-gray-400">
                                No movies found.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
