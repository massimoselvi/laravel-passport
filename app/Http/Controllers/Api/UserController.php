<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

// use App\User;
// use Response;

class UserController extends Controller {

	public function __construct() {
		$this->content = array();
	}

	public function login() {
		// dump(request()->route());
		// dump(session());
		// dump(session()->guard());
		// dump(request()->input());
		// dump(request('email'));
		// dump(request('password'));

		/*

		guard()->attempt(
		$this->credentials($request), $request->has('remember')
		);

		 */
		// dump(Auth::attempt(['email' => request('email'), 'password' => request('password')]));
		// dd(__FILE__ . ' - ' . __LINE__);

		if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
			$user = Auth::user();
			// $this->content['token'] = $user->createToken('Pizza App')->accessToken;
			$session = $user->createToken('session')->accessToken;
			// $this->content['session'] = $session;
			$this->content['data'] = ['session' => $session];
			$status = 200;
		} else {
			$this->content['error'] = "Unauthorised";
			$status = 401;
		}
		return response()->json($this->content, $status);
	}
	public function details() {
		return response()->json(['user' => Auth::user()]);
	}
}
