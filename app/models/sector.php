<?php

class Sector extends Base {

	public static $table = 'sectors';

	public static function dropdown() {
		$items = array();

		foreach(static::get() as $item) {
			$items[$item->id] = $item->title;
		}

		return $items;
	}

	public static function slug($slug) {
		return static::where('slug', 'like', $slug)->fetch();
	}

	public static function id($name) {
		if (empty(trim($name))) return;
		if ( !$sector = static::where('title', 'like', $name)->fetch()) {
			$input = array('title' => $name, 'slug' => slug($name));
			$sector = static::create($input);
			return $sector->id;
		}
		return $sector->id;
	}

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('id')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/sectors'));
	}

	public static function listing($branch = null, $page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		if ($branch) {

			$query = $query->left_join(
					Base::table('hierarchies'),
					Base::table('hierarchies.sector'), '=', Base::table('sectors.id'));

			$query = $query->where(Base::table('hierarchies.branch'), '=', $branch);
		}

		$query->group('sector');

		$count = $query->count();

		$sectors = $query->take($perpage)
				->skip(--$page * $perpage)
				->get(array(Base::table('sectors.*')));

		return array($count, $sectors);

	}

	public static function search($term, $page = 1, $per_page = 10) {

		$query = Query::table(static::table());

		if ($term) {
			$query->where('title', 'like', '%' . $term . '%')
			->or_where('slug', '=', $term);
		}

		$count = $query->count();

		$sectors = $query->take($per_page)
		->skip(--$page * $per_page)
		->get();

		return new Paginator($sectors, $count, $page, $per_page, Uri::to('admin/sectors'));
	}

}
