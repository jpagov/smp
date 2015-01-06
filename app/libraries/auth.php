<?php

class Auth {

	private static $session = 'auth';

	public static function guest() {
		return Session::get(static::$session) === null;
	}

	public static function user() {
		if($id = Session::get(static::$session)) {
		$staff = User::find($id);
		$staff->roles = Role::staff($id);
			return $staff;
		}
	}

	public static function admin() {
		if($id = Session::get(static::$session)) {
			return User::find($id)->role == "administrator";
		}

		return false;
	}

	public static function check() {
		$id = Session::id();
		$table = Base::table('sessions');

		if( Query::table($table)->where('id', '=', $id)->count()) {
			return true;
		}

		return false;
	}

	public static function me($id) {
		return $id == Session::get(static::$session);
	}

	public static function attempt($username, $password) {
		if($user = Staff::where('username', '=', $username)
			->where('account', '=', '1')->fetch()) {
			// found a valid user now check the password
			if(Hash::check($password, $user->password)) {
				// store user ID in the session
				Session::put(static::$session, $user->id);

				return true;
			}
		}

		return false;
	}

	public static function logout() {
		Session::erase(static::$session);
	}

}
