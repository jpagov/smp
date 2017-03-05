<?php

class Division extends Base {

	public static $table = 'divisions';

	public static function dropdown() {
		$items = array();

		foreach(static::sort('order', 'asc')->get() as $item) {
			$items[$item->id] = $item->title;
		}

		return $items;
	}

	public static function id($name) {
		$name = trim($name);
		if (empty($name)) return;
		if ( !$division = static::where('title', 'like', $name)->fetch()) {
			$input = [
				'title' => $name,
				'title_en' => $name,
				'slug' => slug($name),
				'view' => 1,
				'staff' => 0,
			];
			$division = static::create($input);
			return $division->id;
		}
		return $division->id;
	}

	public static function listing() {

		return static::sort('order', 'asc')->get(array('id', 'slug', 'title', 'staff'));
	}

	public static function slug($slug) {
		return static::where('slug', '=', $slug)->fetch();
	}

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('order', 'asc')->get();

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

	public static function search($term, $page = 1, $per_page = 10) {

		$query = Query::table(static::table());

		if ($term) {
			$query->where('title', 'like', '%' . $term . '%')
				  ->or_where('slug', '=', $term);
		}

		$count = $query->count();

		$query->sort('order', 'asc');

		$divisions = $query->take($per_page)
		->skip(--$page * $per_page)
		->get();

		return new Paginator($divisions, $count, $page, $per_page, Uri::to('admin/divisions'));
	}

}
