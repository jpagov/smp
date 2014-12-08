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
    if (empty(trim($name))) return;
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

	public static function listing($division = null, $page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		if ($division) {

			$query = $query->left_join(
					Base::table('hierarchies'),
					Base::table('hierarchies.branch'), '=', Base::table('branchs.id'));

			$query = $query->where(Base::table('hierarchies.division'), '=', $division);
		}

		$query->group('branch');

		$count = $query->count();

		$branchs = $query->take($perpage)
				->skip(--$page * $perpage)
				->get(array(Base::table('branchs.*')));

		return array($count, $branchs);

	}


	public static function division($division, $page = 1, $perpage = 10) {

		if ( !$div = Division::slug($division)) {
			Notify::warning(__('branchs.no_result'));
			return Response::redirect('admin/branchs');
		}

		if (!$hierarchies = Hierarchy::where('division', '=', $div->id)->group('branch')->get()) {
			Notify::warning(__('branchs.no_result'));
			return Response::redirect('admin/branchs');
		}

		$branchs = array();

		foreach ($hierarchies as $hierarchy) {
			$branchs[] = $hierarchy->branch;
		}

		$branchs = array_filter($branchs);


		$query = Query::table(static::table());

		$query = $query->where_in('id', $branchs);

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('id')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/branchs'));
	}

}
