<?php

use App\Http\Controllers\AdminMovieListController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\QuoteController;
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

//language switcher
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

//home
Route::middleware('setLocale')->group(function () {
	Route::get('/', [HomePageController::class, 'index']);
	Route::get('/listing/{movie:slug}', [HomePageController::class, 'show'])->name('listing');
});

//login and logout
Route::middleware('setLocale')->group(function () {
	Route::view('admin/login', 'sessions.session')->name('login')->middleware('guest');
	Route::post('admin/login', [AuthController::class, 'store'])->middleware('guest');
	Route::post('admin/logout', [AuthController::class, 'destroy'])->name('logout')->middleware('auth');
});

//admin movies
Route::middleware(['auth', 'setLocale'])->group(function () {
	Route::post('/admin/movies', [AdminMovieListController::class, 'store']);
	Route::view('admin/movies/create', 'admin.movies.create')->name('movies.create');
	Route::get('admin/movies', [AdminMovieListController::class, 'index'])->name('movies');
	Route::get('admin/movies/{movie:slug}/edit', [AdminMovieListController::class, 'edit'])->name('movies.edit');
	Route::patch('admin/movies/{movie:slug}', [AdminMovieListController::class, 'update'])->name('movies.update');
	Route::delete('admin/movies/{movie:slug}', [AdminMovieListController::class, 'destroy'])->name('movies.destroy');
});

//admin quotes
Route::middleware(['auth', 'setLocale'])->prefix('/admin/movies')->group(function () {
	Route::post('/{movie:slug}/quotes/create', [QuoteController::class, 'store']);
	Route::get('/{movie:slug}/quotes/create', [QuoteController::class, 'create'])->name('quotes.create');
	Route::get('/{movie:slug}/quotes', [QuoteController::class, 'index'])->name('quotes');
	Route::get('/{movie:slug}/quotes/{quote}/edit', [QuoteController::class, 'edit'])->name('quotes.edit');
	Route::patch('/{movie:slug}/quotes/{quote}', [QuoteController::class, 'update'])->name('quotes.update');
	Route::delete('/{movie:slug}/quotes/{quote}', [QuoteController::class, 'destroy'])->name('quotes.destroy');
});
