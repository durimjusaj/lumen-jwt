<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller {

	public function login(LoginRequest $request) {

		$credentials = $request->only('email', 'password');

		$token = JWTAuth::attempt($credentials);

		if($token){
			return response()->json([
				"status" => 200,
				"token" => $token
			]);
		}

		return response()->json([
			"status" => 401,
			"error" => 'invalid_credentials'
		], 401);
	}

}
