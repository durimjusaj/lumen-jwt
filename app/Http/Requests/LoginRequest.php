<?php

namespace App\Http\Requests;

use Urameshibr\Requests\FormRequest;

class LoginRequest extends FormRequest {
	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'email' => 'required',
			'password' => 'required'
		];
	}
}