<?php

class Scheme extends Base {

	public static $table = 'schemes';

	public static function dropdown() {
		$items = array();

		foreach(static::get() as $item) {
			$items[strtoupper($item->id)] = $item->title;
		}

		return $items;
	}

	public static function slug($slug) {
		return static::where('slug', 'like', $slug)->fetch();
	}

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('title')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('schemes'));
	}

}
