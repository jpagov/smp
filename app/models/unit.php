<?php

class Unit extends Base {

	public static $table = 'units';

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
    if ( !$unit = static::where('title', 'like', $name)->fetch()) {
      $input = array('title' => $name, 'slug' => slug($name));
      $unit = static::create($input);
      return $unit->id;
    }
    return $unit->id;
  }

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('id')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/units'));
	}

	public static function listing($sector = null, $page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		if ($sector) {

			$query = $query->left_join(
					Base::table('hierarchies'),
					Base::table('hierarchies.unit'), '=', Base::table('units.id'));

			$query = $query->where(Base::table('hierarchies.sector'), '=', $sector);
		}

		$query->group('unit');

		$count = $query->count();

		$units = $query->take($perpage)
				->skip(--$page * $perpage)
				->get(array(Base::table('units.*')));

		return array($count, $units);

	}

	public static function search($term, $page = 1, $per_page = 10) {

		$query = Query::table(static::table());

		if ($term) {
			$query->where('title', 'like', '%' . $term . '%')
			->or_where('slug', '=', $term);
		}

		$count = $query->count();

		$units = $query->take($per_page)
		->skip(--$page * $per_page)
		->get();

		return new Paginator($units, $count, $page, $per_page, Uri::to('admin/units'));
	}

}
