<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::resource('movies', MovieController::class);

Route::get('/', [MovieController::class, 'index']);

Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail']);

Route::get('dashboard', function() {
    return view('movies.index');
});

Route::get('movieList', function() {
    return view('movies.index');
});


