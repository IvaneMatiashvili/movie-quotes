<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
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
			'quote'     => $request->quote,
			'movie_id'  => $movie->id,
			'thumbnail' => $request->file('thumbnail')->store('public/thumbnails'),
		]);

		return back()->with('success', 'Quote has created successfully');
	}

	public function edit(Movie $movie, Quote $quote)
	{
		return view('admin.quotes.edit', [
			'movie' => $movie,
			'quote' => $quote,
		]);
	}

	public function update(Movie $movie, Quote $quote, StoreUserRequest $request)
	{
		if (isset($request['thumbnail']))
		{
			$quote->update([
				'thumbnail'          => $request->file('thumbnail')->store('thumbnails'),
			]);
		}

		$quote->update([
			'quote'          => $request->quote,
		]);

		return redirect(route('quotes', $movie->slug))->with('success', 'Quote title has updated successfully');
	}

	public function destroy(Movie $movie, Quote $quote)
	{
		$quote->delete();
		return redirect(route('quotes', $movie->slug))->with('success', 'Quote has deleted successfully');
	}
}
