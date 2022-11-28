<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class HomePageController extends Controller
{
	public function index()
	{
		$currentLanguage = Config::get('languages')[App::getLocale()];
		if (Quote::count())
		{
			$randomQuote = Quote::all()->random();
			$randomMovie = $randomQuote->movie;
			return view('home.index', [
				'randomMovie'     => $randomMovie,
				'randomQuote'     => $randomQuote,
				'currentLanguage' => $currentLanguage,
			]);
		}
		else
		{
			return view('home.index', [
				'randomQuote'     => Quote::latest(),
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
