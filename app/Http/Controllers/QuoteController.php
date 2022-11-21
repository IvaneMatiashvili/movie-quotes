<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Movie;
use App\Models\Quote;

class QuoteController extends Controller
{
	public function index(Movie $movie)
	{
		return view('admin.quotes.index', [
			'quotes' => $movie->quotes()->latest()->paginate(2),
			'movie'  => $movie,
		]);
	}

	public function create(Movie $movie)
	{
		return view('admin.quotes.create', [
			'movie' => $movie,
		]);
	}

	public function store(Movie $movie, StoreUserRequest $request)
	{
		Quote::create([
			'quote'     => [
				'en' => $request['quote'],
				'ka' => $request['quote-ka'],
			],
			'movie_id'  => $movie->id,
			'thumbnail' => $request->file('thumbnail')->store('thumbnails'),
		]);

		return back()->with('success', __('success.quote_store'));
	}

	public function edit(Movie $movie, Quote $quote)
	{
		return view('admin.quotes.edit', [
			'movie' => $movie,
			'quote' => $quote,
		]);
	}

	public function update(Movie $movie, Quote $quote, UpdateUserRequest $request)
	{
		if (isset($request['thumbnail']))
		{
			$quote->update([
				'thumbnail'          => $request->file('thumbnail')->store('thumbnails'),
			]);
		}

		$quote->update([
			'quote'          => [
				'en' => $request['quote'],
				'ka' => $request['quote-ka'],
			],
		]);

		$lang = request()->segment(count(request()->segments()));

		return redirect(route('quotes', [$movie->slug, $lang]))->with('success', __('success.quote_update'));
	}

	public function destroy(Movie $movie, Quote $quote)
	{
		$quote->delete();

		$lang = request()->segment(count(request()->segments()));
		return redirect(route('quotes', [$movie->slug, $lang]))->with('success', __('success.quote_delete'));
	}
}
