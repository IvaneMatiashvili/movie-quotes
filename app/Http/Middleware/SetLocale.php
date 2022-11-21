<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
	public function handle($request, Closure $next)
	{
		/*		$lang = $request->route('lang');
				app()->setLocale($lang);*/

		if (Session()->has('applocale') && array_key_exists(Session()->get('applocale'), config('languages')))
		{
			App::setLocale(Session()->get('applocale'));
		}
		else
		{
			App::setLocale(config('app.fallback_locale'));
		}

		return $next($request);
	}
}
