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
			return redirect(route('movies'));
		}

		throw ValidationException::withMessages([
			'username' => 'your provided username could not be verified',
			'password' => 'your provided password could not be verified',
		]);
	}

	public function destroy()
	{
		auth()->logout();
		return redirect(route('login'));
	}
}
