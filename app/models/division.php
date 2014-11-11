<?php

class Division extends Base {

	public static $table = 'divisions';

	public static function dropdown() {
		$items = array();

		foreach(static::get() as $item) {
			$items[$item->id] = $item->title;
		}

		return $items;
	}

	public static function id($name) {
		if (empty(trim($name))) return;
		if ( !$division = static::where('title', 'like', $name)->fetch()) {
			$input = array('title' => $name, 'slug' => slug($name));
			$division = static::create($input);
			return $division->id;
		}
		return $division->id;
	}

	public static function listing() {

		return static::get(array('id', 'slug', 'title', 'staff'));
	}

	public static function slug($slug) {
		return static::where('slug', '=', $slug)->fetch();
	}

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('id')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/divisions'));
	}

	public static function counter() {
		foreach (static::get() as $division) {
			$total = Staff::where('division', '=', $division->id)->count();
			if ( $division->staff < $total ) {
				Division::update($division->id, array('staff' => $total));
			}

		}
	}

}
