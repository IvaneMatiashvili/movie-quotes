<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Movie;
use Illuminate\Support\Str;

class AdminMovieListController extends Controller
{
	public function index()
	{
		return view('admin.movies.index', [
			'movies' => Movie::latest()->paginate(3),
		]);
	}

	public function store(StoreUserRequest $request)
	{
		$movie = Movie::create([
			'title'     => [
				'en' => $request['title'],
				'ka' => $request['title-ka'],
			],

			'slug'      => Str::lower($request->title),
		]);
		$lang = request()->segment(count(request()->segments()));

		return redirect(route('movies', $lang))->with('success', __('success.movie_title_store'), );
	}

	public function edit(Movie $movie)
	{
		return view('admin.movies.edit', [
			'movie' => $movie,
		]);
	}

	public function update(Movie $movie, UpdateUserRequest $request)
	{
		$movie->update([
			'title'     => [
				'en' => $request['title'],
				'ka' => $request['title-ka'],
			],
			'slug'      => Str::lower($request->title),
		]);

		$lang = request()->segment(count(request()->segments()));
		return redirect(route('movies', $lang))->with('success', __('success.movie_title_update'));
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();

		$lang = request()->segment(count(request()->segments()));
		return redirect(route('movies', $lang))->with('success', __('success.movie_title_delete'));
	}
}
