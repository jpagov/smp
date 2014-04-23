<?php

class User extends Base {

	public static $table = 'staffs';

	public static function search($params = array()) {
		$query = static::where('account', '=', '1');

		foreach($params as $key => $value) {
			$query->where($key, '=', $value);
		}

		return $query->fetch();
	}

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());
    $query = $query->where('account', '=', '1');

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('grade', 'desc')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('users'));
	}

}
