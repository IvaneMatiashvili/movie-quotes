<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
	protected $signature = 'create:admin';

	protected $description = 'Create admin';

	public function handle()
	{
		$username = $this->ask('username');

		$password = $this->secret('Password');

		$validator = Validator::make([
			'username' => $username,
			'password' => $password,
		], [
			'username' => ['required'],
			'password' => ['required', 'min:4'],
		]);

		if ($validator->fails())
		{
			$this->info('Admin Account not created. See error messages below:');

			foreach ($validator->errors()->all() as $error)
			{
				$this->error($error);
			}
			return 1;
			$validator->errors()->all();
		}
		else
		{
			User::create([
				'username' => $username,
				'password' => $password,
			]);

			$this->info('Admin Account created.');
		}
	}
}
