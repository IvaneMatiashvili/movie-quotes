<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		Movie::truncate();
		Quote::truncate();

		Quote::factory(2)->create([
			'thumbnail' => UploadedFile::fake()->image(uniqid() . '.jpg')->store('thumbnails'),
		]);
	}
}
