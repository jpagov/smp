<?php

class Log extends Base {

	public static $table = 'logs';

	public static function listing($input = []) {

		$query = Query::table(static::table());


		if ($branch) {

			$query = $query->left_join(
					Base::table('hierarchies'),
					Base::table('hierarchies.sector'), '=', Base::table('sectors.id'));

			$query = $query->where(Base::table('hierarchies.branch'), '=', $branch);
		}


		if (!empty($input)) {
			$query->where('when', '>=', $input['from'])
				  ->where('when', '<=', $input['to']);
		}

		return static::sort('when', 'desc')->get();
	}

	public static function paginate($input = [], $page = 1, $perpage = 10) {
		$query = static::left_join(Base::table('staffs'), Base::table('staffs.id'), '=', Base::table('logs.who'));

		if (!empty($input)) {
			$query->where(Base::table('logs.when'), '>=', $input['from'])
				  ->where(Base::table('logs.when'), '<=', $input['to']);
		}

		$count = $query->count();


		$results = $query->take($perpage)
			->skip(($page - 1) * $perpage)
			->sort(Base::table('logs.when'), 'desc')
			->get(array(
				Base::table('logs.*'),
				Base::table('staffs.display_name as name'),
				Base::table('staffs.role as role'),
			));

		return new Paginator($results, $count, $page, $perpage, Uri::to('logs'));
	}

}
