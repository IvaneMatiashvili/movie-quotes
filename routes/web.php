<?php

use App\Http\Controllers\AdminMovieListController;
use App\Http\Controllers\HomePageController;
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

//home
Route::middleware('setLocale')->group(function () {
	Route::get('/{lang}', [HomePageController::class, 'index']);
	Route::get('/listing/{movie:slug}/{lang}', [HomePageController::class, 'show'])->name('listing');
});

//login and logout
Route::middleware('setLocale')->group(function () {
	Route::get('admin/login/{lang}', [SessionsController::class, 'create'])->name('login')->middleware('guest');
	Route::post('admin/login/{lang}', [SessionsController::class, 'store'])->middleware('guest');
	Route::post('admin/logout/{lang}', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');
});

//admin movies
Route::middleware(['auth', 'setLocale'])->group(function () {
	Route::post('/admin/movies/{lang}', [AdminMovieListController::class, 'store']);
	Route::get('admin/movies/create/{lang}', [AdminMovieListController::class, 'create'])->name('movies.create');
	Route::get('admin/movies/{lang}', [AdminMovieListController::class, 'index'])->name('movies');
	Route::get('admin/movies/{movie:slug}/edit/{lang}', [AdminMovieListController::class, 'edit'])->name('movies.edit');
	Route::patch('admin/movies/{movie:slug}/{lang}', [AdminMovieListController::class, 'update'])->name('movies.update');
	Route::delete('admin/movies/{movie:slug}/{lang}', [AdminMovieListController::class, 'destroy'])->name('movies.destroy');
});

//admin quotes
Route::middleware(['auth', 'setLocale'])->group(function () {
	Route::post('/admin/movies/{movie:slug}/quotes/create/{lang}', [QuoteController::class, 'store']);
	Route::get('/admin/movies/{movie:slug}/quotes/create/{lang}', [QuoteController::class, 'create'])->name('quotes.create');
	Route::get('/admin/movies/{movie:slug}/quotes/{lang}', [QuoteController::class, 'index'])->name('quotes');
	Route::get('admin/movies/{movie:slug}/quotes/{quote}/edit/{lang}', [QuoteController::class, 'edit'])->name('quotes.edit');
	Route::patch('admin/movies/{movie:slug}/quotes/{quote}/{lang}', [QuoteController::class, 'update'])->name('quotes.update');
	Route::delete('admin/movies/{movie:slug}/quotes/{quote}/{lang}', [QuoteController::class, 'destroy'])->name('quotes.destroy');
});
