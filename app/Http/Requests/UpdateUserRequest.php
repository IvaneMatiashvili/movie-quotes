<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
	public function rules()
	{
		return $this->has('title') ? $this->updateMovie() : $this->updateQuote();
	}

	protected function updateMovie()
	{
		return [
			'title'     => ['required', 'max:255', Rule::unique('movies', 'title')->ignore($this->movie['id'])],
		];
	}

	protected function updateQuote()
	{
		return [
			'thumbnail' => 'image',
			'quote'     => 'required|max:600',
		];
	}
}
