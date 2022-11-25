<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
	protected $model = Quote::class;

	protected $factory = Factory::class;

	public function definition()
	{
		return [
			'movie_id'  => Movie::factory(),
			'quote'     => $this->faker->sentence(),
			'thumbnail' => null,
		];
	}
}
