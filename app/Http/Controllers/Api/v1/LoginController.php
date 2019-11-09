<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
class LoginController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

		$validate = Validator::make($data, [
			'email' => 'required|string|email|max:255',
			'password' => 'required|string',
		]);

		if ($validate->fails()) {
			return ['status' => false, "validate" => true, "erros" => $validate->errors()];
		}

		if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
			$user = auth()->user();
			$user->token = $user->createToken($user->email)->accessToken;
			return ['status' => true, "user" => $user];
		} else {
			return ['status' => false];
		}
    }
}
