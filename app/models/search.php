<?php

class Search extends Base {

	public static $table = 'search';

	private static function get($row, $val) {
		return static::where($row, '=', $val)->fetch();
	}

	private static function parse($term) {

		$term = htmlspecialchars($term);
		$original = $term;

		$result = array();
		preg_match_all("/([^,= ]+):([^= ]+)/", $term, $m);
		foreach ($m[0] as $found) {
			$term = str_replace($found, '', $term);
		}

		$result = array_combine_key($m[1], $m[2]);
		$result['term'] = trim($term);

		$value = array_map(function($var) {
			return explode(',', $var);
		}, $m[2]);

		return array_merge(array_combine_key($m[1], $value), array_diff_key($result, array_combine_key($m[1], $value)));
	}

}
