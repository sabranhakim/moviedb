<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');

Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail'])->name('movies.detail');

Route::get('/create-movie', [MovieController::class, 'create'])->name('createMovie')->middleware('auth');

Route::post('/', [MovieController::class, 'store'])->name('store')->middleware('auth');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
