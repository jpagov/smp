<?php

class Searchr extends Base {

	public static $table = 'search_report';

	private static function get($row, $val) {
		return static::where($row, '=', $val)->fetch();
	}

	public static function search($term) {
		if (empty($term)) return false;
		if ( !$search = static::where('search', '=', $term)->fetch()) {
			$input = [
				'search' => $term,
				'total' => 0
			];
			$search = static::create($input);
		}

		static::update($search->id, ['total' => $search->total +1]);

		return $search->search;
	}

	public static function paginate($input = [], $page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		if (isset($input['term'])) {

			$query->where('search', 'LIKE', '%' . trim($input['term']) . '%');
			Registry::set('admin_search_term', $input['term']);

		}

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('total', 'desc')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/reports/search'));
	}

}
