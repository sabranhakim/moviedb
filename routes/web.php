<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');

Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail'])->name('movies.detail');

Route::get('/create-movie', [MovieController::class, 'create'])->name('createMovie')->middleware('auth', RoleAdmin::class);

Route::post('/', [MovieController::class, 'store'])->name('store')->middleware('auth');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/listMovie', [MovieController::class, 'listMovie'])->name('listMovie');

Route::get('/editMovie/{movie}', [MovieController::class, 'editMovie'])->name('editMovie')->middleware('auth', RoleAdmin::class);
Route::put('/editMovie/{movie}', [MovieController::class, 'updateMovie'])->name('movies.update')->middleware('auth', RoleAdmin::class);

Route::delete('/deleteMovie/{movie}', [MovieController::class, 'delete'])->name('deleteMovie')->middleware('auth', RoleAdmin::class);
