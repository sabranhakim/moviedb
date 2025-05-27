<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');

Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail'])->name('movies.detail');

Route::get('/create-movie', [MovieController::class, 'create'])->name('createMovie');

Route::post('/', [MovieController::class, 'store'])->name('store');