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

    public static function listing() {

        return static::get(array('slug', 'title', 'staff'));
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
      Division::update($division->id, array('staff' => $total));
    }
  }

}
