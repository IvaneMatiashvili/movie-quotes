<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
	public function handle($request, Closure $next)
	{
		$lang = $request->route('lang');
		app()->setLocale($lang);

		return $next($request);
	}
}
