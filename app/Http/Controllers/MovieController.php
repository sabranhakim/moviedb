<?php

namespace App\Http\Controllers;

use Stringable;
use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MovieController extends Controller
{
    public function index()
    {
        $topMovies = Movie::latest()->take(10)->get();
        $favoriteMovies = Movie::oldest()->take(6)->get();

        return view('movies.index', compact('topMovies', 'favoriteMovies'));
    }

    public function listMovie()
    {
        $movies = Movie::all();
        return view('movies.listMovie', compact('movies'));
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

    public function editMovie(Movie $movie)
    {
        $categories = Category::all();
        return view('movies.edit', compact('movie', 'categories'));
    }

    public function updateMovie(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->title);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $movie->update($validated);


        return redirect()->route('movies.index')->with('success', 'Movie updated.');
    }

    public function delete(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('listMovie')->with('success', 'Movie deleted.');
    }

    public function detail($id, $slug)
    {
        $movie = Movie::find($id);
        return view('movies.detailmovie', compact('movie'));
    }
}
?>
