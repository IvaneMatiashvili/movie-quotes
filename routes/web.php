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

Route::get('/admin/login/{username}/{password}', [SessionsController::class, 'store']);
Route::post('admin/logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('can:admin');

//admin movies
Route::post('/admin/movies', [AdminMovieListController::class, 'store'])->middleware('can:admin');
Route::get('admin/movies/create', [AdminMovieListController::class, 'create'])->name('movies.create')->middleware('can:admin');
Route::get('admin/movies', [AdminMovieListController::class, 'index'])->name('movies')->middleware('can:admin');
Route::get('admin/movies/{movie:slug}/edit', [AdminMovieListController::class, 'edit'])->name('movies.edit')->middleware('can:admin');
Route::patch('admin/movies/{movie:slug}', [AdminMovieListController::class, 'update'])->name('movies.update')->middleware('can:admin');
Route::delete('admin/movies/{movie:slug}', [AdminMovieListController::class, 'destroy'])->name('movies.destroy')->middleware('can:admin');

//admin quotes
Route::post('/admin/movies/{movie:slug}/quotes/create', [QuoteController::class, 'store'])->middleware('can:admin');
Route::get('/admin/movies/{movie:slug}/quotes/create', [QuoteController::class, 'create'])->name('quotes.create')->middleware('can:admin');
Route::get('/admin/movies/{movie:slug}/quotes', [QuoteController::class, 'index'])->name('quotes')->middleware('can:admin');
Route::get('admin/movies/{movie:slug}/quotes/{quote}/edit', [QuoteController::class, 'edit'])->name('quotes.edit')->middleware('can:admin');
Route::patch('admin/movies/{movie:slug}/quotes/{quote}', [QuoteController::class, 'update'])->name('quotes.update')->middleware('can:admin');
Route::delete('admin/movies/{movie:slug}/quotes/{quote}', [QuoteController::class, 'destroy'])->name('quotes.destroy')->middleware('can:admin');
