<?php

class Search extends Base {

	public static $table = 'search';

	public static function fields($field = array(
			'search',
		)) {
		$fields = array();
		foreach ($field as $column) {
			$fields[] = Base::table('search.' . $column);
		}
		return $fields;
	}

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

	public static function paginate($input = [], $page = 1, $perpage = 10) {
		$query = Query::table(static::table());
		$groups = true;

		if (isset($input['term'])) {
			//$query->where('search', 'LIKE', '%' . $input['term'] . '%');
			$query->where('search', '=', $input['term']);
			$groups = false;
		}

		if (!empty($input)) {
			$query->where('created', '>=', $input['from'])
				  ->where('created', '<=', $input['to']);
		}

		$query->group('search');
				//dd($query->take($perpage)->skip(($page - 1) * $perpage)->sort('total', 'desc')->get_count(['search'], 'search'));

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('total', 'desc')->get_count(['search'], 'search');

		//array_multisort($results, SORT_ASC);
		//dd($results);

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/reports/search'));
	}

}
