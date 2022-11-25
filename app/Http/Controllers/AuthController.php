<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(StoreLoginRequest $request)
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

	public function logout()
	{
		auth()->logout();
		$lang = request()->segment(count(request()->segments()));
		return redirect(route('login', $lang));
	}
}
