<?php

class Organization extends Base {

	public static $table = 'organizations';

	public static function dropdown() {
		$items = [];

		foreach(static::sort('order', 'asc')->get() as $item) {
			$items[$item->id] = $item->title;
		}

		return $items;
	}

	public static function id($name) {
		if (empty(trim($name))) return;
		if ( !$organization = static::where('title', 'like', $name)->fetch()) {
			$input = ['title' => $name, 'slug' => slug($name)];
			$organization = static::create($input);
			return $organization->id;
		}
		return $organization->id;
	}

	public static function listing() {

		return static::sort('order', 'asc')->get(['id', 'slug', 'title', 'staff']);
	}

	public static function slug($slug) {
		return static::where('slug', '=', $slug)->fetch();
	}

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('order', 'asc')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/organizations'));
	}

	public static function counter() {
		foreach (static::get() as $organization) {
			$total = Staff::where('organization', '=', $organization->id)->count();
			if ( $organization->staff < $total ) {
				Organization::update($organization->id, ['staff' => $total]);
			}

		}
	}

	public static function search($term, $page = 1, $per_page = 10) {

		$query = Query::table(static::table());

		if ($term) {
			$query->where('title', 'like', '%' . $term . '%')->or_where('slug', '=', $term);
		}

		$count = $query->count();

		$query = $query->sort('order', 'asc');

		$organizations = $query->take($per_page)
		->skip(--$page * $per_page)
		->get();

		return new Paginator($organizations, $count, $page, $per_page, Uri::to('admin/organizations'));
	}

}
