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
		return [
			'title'     => ['required', 'max:255', Rule::unique('movies', 'title')],
			'thumbnail' => 'required',
			'quote'     => 'required',
		];
	}
}
