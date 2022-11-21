<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		/*		return $this->has('title') ? $this->storeMovie() : $this->storeQuote();*/

		if ($this->has('title') && $this->has('quote'))
		{
			return $this->storeMovieAndQuote();
		}
		elseif ($this->has('title'))
		{
			return $this->storemovie();
		}
		else
		{
			return $this->storeQuote();
		}
	}

	protected function storeMovie()
	{
		return [
			'title'        => ['required', 'max:255', Rule::unique('movies', 'title')],
			'title-ka'     => ['required', 'max:255', Rule::unique('movies', 'title')],
		];
	}

	protected function storeQuote()
	{
		return [
			'thumbnail'    => 'required|image',
			'quote'        => 'required|max:600',
			'quote-ka'     => 'required|max:600',
		];
	}

	protected function storeMovieAndQuote()
	{
		return [
			'title'           => ['required', 'max:255', Rule::unique('movies', 'title')],
			'title-ka'        => ['required', 'max:255', Rule::unique('movies', 'title')],
			'thumbnail'       => 'required|image',
			'quote'           => 'required|max:600',
			'quote-ka'        => 'required|max:600',
		];
	}
}
