<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersIndexRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'limit' => [
				'sometimes',
				'numeric',
			],
		];
	}
}