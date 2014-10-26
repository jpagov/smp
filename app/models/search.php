<?php

class Search extends Base {

	public static $table = 'search';

	private static function get($row, $val) {
		return static::where($row, '=', $val)->fetch();
	}

}
