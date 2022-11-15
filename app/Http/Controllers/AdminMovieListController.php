<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Support\Str;

class AdminMovieListController extends Controller
{
	public function index()
	{
		return view('admin.movies.index', [
			'movies' => Movie::latest()->paginate(5),
		]);
	}

	public function create()
	{
		return view('admin.movies.create');
	}

	public function store(StoreUserRequest $request)
	{
		$movie = Movie::create([
			'title'     => $request->title,
			'slug'      => Str::lower($request->title),
		]);

		Quote::create([
			'quote'     => $request->quote,
			'movie_id'  => $movie->id,
			'thumbnail' => $request->file('thumbnail')->store('public/thumbnails'),
		]);

		return redirect(route('movies'))->with('success', 'Movie title has created successfully');
	}

	public function edit(Movie $movie)
	{
		return view('admin.movies.edit', [
			'movie' => $movie,
		]);
	}

	public function update(Movie $movie, StoreUserRequest $request)
	{
		$movie->update([
			'title'     => $request->title,
			'slug'      => Str::lower($request->title),
		]);
		return redirect(route('movies'))->with('success', 'Movie title has updated successfully');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();
		return redirect(route('movies'))->with('success', 'Movie title has deleted successfully');
	}
}
