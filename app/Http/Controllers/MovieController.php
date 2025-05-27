<?php

namespace App\Http\Controllers;

use Stringable;
use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Str;
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
        //ambil semua data inputan dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'actors' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $slug = Str::slug($request->title);

        //ambil input file dan simpan ke storage

        // if ($request->hasFile('cover_image')) {
        //     $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        // }

        $cover = null;
        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');
        }

        //simpan ke table movies
        Movie::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'synopsis' => $validated['synopsis'],
            'category_id' => $validated['category_id'],
            'year' => $validated['year'],
            'actors' => $validated['actors'],
            'cover_image' => $cover,
        ]);

        //Movie::create($validated);

        return redirect('/')->with('success', 'Movie saved successfully');
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

    public function detail($id, $slug)
    {
        $movie = Movie::find($id);
        return view('movies.detailmovie', compact('movie'));
    }
}
?>
