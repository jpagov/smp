<?php

class Sector extends Base {

	public static $table = 'sectors';

	public static function dropdown($division = null) {
		$items = [];

		$query = Query::table(static::table());

        if ($division) {

            if (!is_array($division)) {
                $division = [$division];
            }

            $query = $query->left_join(
                Base::table('hierarchies'),
                Base::table('hierarchies.sector'), '=', Base::table('sectors.id'));

            $query = $query->where_in(Base::table('hierarchies.division'), $division);
            $query->group('sector')->sortNull('sort', 'desc')->sort('title');
        }

        foreach ($query->get([Base::table('sectors.id'), Base::table('sectors.title')]) as $item) {
            $items[$item->id] = $item->title;
        }

		return $items;
	}

	public static function slug($slug) {
		return static::where('slug', 'like', $slug)->fetch();
	}

	public static function id($name) {
		$name = trim($name);
		if (empty($name)) return;
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

	public static function division($division, $page = 1, $perpage = 10) {

		if ( !$div = Division::slug($division)) {
			Notify::warning(__('global.no_result'));
			return Response::redirect('admin/sectors');
		}

		if (!$hierarchies = Hierarchy::where('division', '=', $div->id)->group('sector')->get()) {
			Notify::warning(__('global.no_result'));
			return Response::redirect('admin/sectors');
		}

		$sectors = [];

		foreach ($hierarchies as $hierarchy) {
			$sectors[] = $hierarchy->sector;
		}

		$sectors = array_filter($sectors);


		$query = Query::table(static::table());

		$query = $query->where_in('id', $sectors)->sortNull('sort', 'DESC');

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('id')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/sectors'));
	}

}
