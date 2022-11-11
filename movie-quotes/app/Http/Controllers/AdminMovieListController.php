<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Movie;
use App\Models\Quote;

class AdminMovieListController extends Controller
{
	public function create()
	{
		return view('admin.movies.create');
	}

	public function store(StoreUserRequest $request)
	{
		$movie = Movie::create([
			'title'     => $request->title,
			'thumbnail' => $request->file('thumbnail')->store('public/thumbnails'),
		]);

		Quote::create([
			'quote'    => $request->quote,
			'movie_id' => $movie->id,
		]);

		$url = route('movies.create');

		return redirect($url);
	}
}
