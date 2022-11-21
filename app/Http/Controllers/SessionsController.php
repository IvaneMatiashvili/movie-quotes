<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions.session');
	}

	public function store(StoreLoginRequest $request)
	{
		$attributes = $request->validated();

		if (auth()->attempt($attributes))
		{
			$lang = request()->segment(count(request()->segments()));
			return redirect(route('movies', $lang));
		}

		throw ValidationException::withMessages([
			'username' => __('validation.custom.username.username_does_not_exist'),
			'password' => __('validation.custom.password.password_does_not_exist'),
		]);
	}

	public function destroy()
	{
		auth()->logout();
		$lang = request()->segment(count(request()->segments()));
		return redirect(route('login', $lang));
	}
}
