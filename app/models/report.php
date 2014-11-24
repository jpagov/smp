<?php

class Report extends Base {

	public static $table = 'staffs';

  // default get all field excerpt username and password
	public static function fields($field = array(
		'id',
		'slug',
		'salutation',
		'first_name',
		'last_name',
		'display_name',
		'gender',
		'job_title',
		'report_to',
		'position',
		'description',
		'scheme',
		'grade',
		'division',
		'branch',
		'sector',
		'unit',
		'email',
		'telephone',
		'fax',
		'status',
		'role',
		'account',
		'view',
		'created'
		)) {
		$fields = array();
		foreach ($field as $column) {
			$fields[] = Base::table('staffs.' . $column);
		}
		return $fields;
	}

	public static function hasno($type = 'email', $division = null, $page = 1, $per_page = 50) {

		if (!ctype_digit($division)) {
			if ($div = Division::slug($division)) {
				$division = $div->id;
			}
		}

		$query = static::where(Base::table('staffs.status'), '=', 'active')
				->where($type, '=', '');

		$total = $query->count();

		if ($division) {
			$query->where('division', '=', $division);
		}

		$results = $query->take($per_page)->skip(($page - 1) * $per_page)->sort('grade', 'desc')->get(array(static::fields(array('id', 'display_name'))));

		return new Paginator($results, $total, $page, $per_page, Uri::to('admin/reports/staffs'));
	}

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('grade', 'desc')->get(array(static::fields()));

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/staffs'));
	}

}
