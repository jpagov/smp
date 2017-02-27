<?php

class Import extends Base {

	public static $table = 'imports';

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('created', 'desc')->get();

		return new Paginator($results, $count, $page, $perpage, url('imports'));
	}

	public static function search($term, $page = 1, $per_page = 10) {

		$query = Query::table(static::table());

		if ($term) {
			$query->where('nama', 'like', '%' . $term . '%')
				->or_where('ic', '=', $term)
				->or_where('emel', '=', $term)
				->or_where('tel', '=', $term);
		}

		$count = $query->count();

		$sectors = $query->take($per_page)
		->skip(--$page * $per_page)
		->get();

		return new Paginator($sectors, $count, $page, $per_page, Uri::to('admin/imports'));
	}


}
