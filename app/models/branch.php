<?php

class Branch extends Base {

	public static $table = 'branchs';

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

    if ( !$branch = static::where('title', 'like', $name)->fetch()) {
      $input = array('title' => $name, 'slug' => slug($name));
      $branch = static::create($input);
      return $branch->id;
    }
    return $branch->id;
  }

  public static function search($params = array()) {
    $query = Query::table(static::table());

    foreach($params as $key => $value) {
      $query->where($key, '=', $value);
    }

    return $query->fetch();
  }

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('id')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/branchs'));
	}

}
