<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class SessionsController extends Controller
{
	public function store()
	{
		$admin = User::first();
		$username = Route::current()->parameter('username');
		$password = Route::current()->parameter('password');

		if (User::count() && $admin->username === $username && Hash::check($password, $admin->password))
		{
			auth()->login($admin);
			return redirect(route('movies'));
		}
		else
		{
			abort(Response::HTTP_FORBIDDEN);
		}
	}

	public function destroy()
	{
		auth()->logout();
	}
}
