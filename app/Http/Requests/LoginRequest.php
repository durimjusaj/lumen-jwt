<?php

namespace App\Http\Requests;

use Dingo\Api\Http\FormRequest;

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