<?php

use App\Http\Controllers\AdminMovieListController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin/login', [SessionsController::class, 'create'])->name('login')->middleware('guest');
Route::post('admin/login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('admin/logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');

//admin movies
Route::middleware('auth')->group(function () {
	Route::post('/admin/movies', [AdminMovieListController::class, 'store']);
	Route::get('admin/movies/create', [AdminMovieListController::class, 'create'])->name('movies.create');
	Route::get('admin/movies', [AdminMovieListController::class, 'index'])->name('movies');
	Route::get('admin/movies/{movie:slug}/edit', [AdminMovieListController::class, 'edit'])->name('movies.edit');
	Route::patch('admin/movies/{movie:slug}', [AdminMovieListController::class, 'update'])->name('movies.update');
	Route::delete('admin/movies/{movie:slug}', [AdminMovieListController::class, 'destroy'])->name('movies.destroy');
});

//admin quotes
Route::middleware('auth')->group(function () {
	Route::post('/admin/movies/{movie:slug}/quotes/create', [QuoteController::class, 'store']);
	Route::get('/admin/movies/{movie:slug}/quotes/create', [QuoteController::class, 'create'])->name('quotes.create');
	Route::get('/admin/movies/{movie:slug}/quotes', [QuoteController::class, 'index'])->name('quotes');
	Route::get('admin/movies/{movie:slug}/quotes/{quote}/edit', [QuoteController::class, 'edit'])->name('quotes.edit');
	Route::patch('admin/movies/{movie:slug}/quotes/{quote}', [QuoteController::class, 'update'])->name('quotes.update');
	Route::delete('admin/movies/{movie:slug}/quotes/{quote}', [QuoteController::class, 'destroy'])->name('quotes.destroy');
});
