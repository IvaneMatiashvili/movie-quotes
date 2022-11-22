<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class HomePageController extends Controller
{
	public function index()
	{
		$currentLanguage = Config::get('languages')[App::getLocale()];
		if (Movie::count())
		{
			$randomMovie = Movie::all()->random();

			if ($randomMovie->quotes->count())
			{
				$randomQuote = $randomMovie->quotes->random();
				return view('home.index', [
					'randomMovie'     => $randomMovie,
					'randomQuote'     => $randomQuote,
					'currentLanguage' => $currentLanguage,
				]);
			}
			else
			{
				return view('home.index', [
					'randomMovie'     => $randomMovie,
					'currentLanguage' => $currentLanguage,
				]);
			}
		}
		else
		{
			return view('home.index', [
				'randomMovie'     => Movie::latest(),
				'currentLanguage' => $currentLanguage,
			]);
		}
	}

	public function show(Movie $movie)
	{
		$currentLanguage = Config::get('languages')[App::getLocale()];
		return view('home.listing', [
			'movie'           => $movie,
			'currentLanguage' => $currentLanguage,
		]);
	}
}
