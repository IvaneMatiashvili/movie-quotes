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
		return $this->isMethod('POST') ? $this->store() : $this->update();
	}

	protected function store()
	{
		return $this->has('title') ? $this->storeMovie() : $this->storeQuote();
	}

	protected function storeMovie()
	{
		return [
			'title'     => ['required', 'max:255', Rule::unique('movies', 'title')],
		];
	}

	protected function storeQuote()
	{
		return [
			'thumbnail' => 'required|image',
			'quote'     => 'required|max:600',
		];
	}

	protected function update()
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
