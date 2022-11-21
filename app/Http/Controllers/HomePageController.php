<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class HomePageController extends Controller
{
	public function index()
	{
		if (Movie::count())
		{
			$random_movie = Movie::all()->random();

			if ($random_movie->quotes->count())
			{
				$random_quote = $random_movie->quotes->random();
				return view('home.index', [
					'random_movie' => $random_movie,
					'random_quote' => $random_quote,
				]);
			}
			else
			{
				return view('home.index', [
					'random_movie' => $random_movie,
				]);
			}
		}
		else
		{
			return view('home.index', [
				'random_movie' => Movie::latest(),
			]);
		}
	}

	public function show(Movie $movie)
	{
		return view('home.listing', [
			'movie'        => $movie,
		]);
	}
}
