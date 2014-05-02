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

}
