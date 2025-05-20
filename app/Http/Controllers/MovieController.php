<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $topMovies = Movie::latest()->take(10)->get();
        $favoriteMovies = Movie::latest()->take(10)->get();
        
        return view('movies.index', compact('topMovies', 'favoriteMovies'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:movies,slug',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie created.');
    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('movies.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:movies,slug,' . $movie->id,
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        if ($request->hasFile('cover_image')) {
            // Optional: delete old file
            $file = $request->file('cover_image');
            $path = $file->store('covers', 'public');
            $validated['cover_image'] = $path;
        }

        $movie->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie updated.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted.');
    }
}
?>
