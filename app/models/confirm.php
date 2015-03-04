<?php

class Confirm extends Base {

	public static $table = 'confirm';

	public static function listing() {

		return static::sort('confirm_date', 'desc')->get();
	}

	public static function paginate($input = [], $page = 1, $perpage = 10) {
		$query = static::left_join(Base::table('staffs'), Base::table('staffs.id'), '=', Base::table('confirm.staff_id'));

		if (!empty($input)) {
			$query->where(Base::table('confirm.confirm_date'), '>=', $input['from'])
				  ->where(Base::table('confirm.confirm_date'), '<=', $input['to']);
		}

		$count = $query->count();


		$results = $query->take($perpage)
			->skip(($page - 1) * $perpage)
			->sort(Base::table('confirm.confirm_date'), 'desc')
			->get(array(
				Base::table('confirm.*'),
				Base::table('staffs.display_name as name'),
			));

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/reports/confirm'));
	}

}
