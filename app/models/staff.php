<?php

class Staff extends Base {

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

	public static function id($id) {
		return static::get('id', $id);
	}

	public static function setid($name) {
		if (empty(trim($name))) return;
		if ( $staff = static::where('display_name', 'like', $name)->where('status', '=', 'active')->fetch()) {
			return $staff->id;
		}
	}

	public static function slug($slug) {
		return static::get('slug', $slug);
	}

	private static function get($row, $val) {
		return static::where($row, '=', $val)
		->fetch(array(static::fields()));
	}

	public static function listing($page = 1, $per_page = 10, $hierarchy = null, $top = null) {

		$query = static::where(Base::table('staffs.status'), '=', 'active');
		$get = array(static::fields());

		if ($top) {
			$query = $query->where(Base::table('staffs.management'), '=', '1');
		} else {

			if( isset($hierarchy['division']) and $division = $hierarchy['division']) {

				$query = $query->left_join(
					Base::table('divisions'),
					Base::table('divisions.id'), '=', Base::table('staffs.division'));
				$query->where(Base::table('staffs.division'), '=', $division->id);

				array_push($get, Base::table('divisions.slug as division_slug'), Base::table('divisions.title as division_title'));
			}

			if( isset($hierarchy['branch']) and $branch = $hierarchy['branch']) {

				$query = $query->left_join(
					Base::table('branchs'),
					Base::table('branchs.id'), '=', Base::table('staffs.branch'));
				$query->where(Base::table('staffs.branch'), '=', $branch->id);

				array_push($get, Base::table('branchs.slug as branch_slug'), Base::table('branchs.title as branch_title'));
			}

			if( isset($hierarchy['sector']) and $sector = $hierarchy['sector']) {

				$query = $query->left_join(
					Base::table('sectors'),
					Base::table('sectors.id'), '=', Base::table('staffs.sector'));
				$query->where(Base::table('staffs.sector'), '=', $sector->id);

				array_push($get, Base::table('sectors.slug as sector_slug'), Base::table('sectors.title as sector_title'));
			}

			if( isset($hierarchy['unit']) and $unit = $hierarchy['unit']) {

				$query = $query->left_join(
					Base::table('units'),
					Base::table('units.id'), '=', Base::table('staffs.unit'));
				$query->where(Base::table('staffs.unit'), '=', $unit->id);

				array_push($get, Base::table('units.slug as unit_slug'), Base::table('units.title as unit_title'));
			}
		}

		$total = $query->count();

    // get staffs
		$staffs = $query->sort(Base::table('staffs.grade'), 'desc')
		->take($per_page)
		->skip(--$page * $per_page)
		->get($get);

		return array($total, $staffs);
	}

	public static function search($term, $page = 1, $per_page = 10, $object = false, $filter = array(), $field = array()) {

		// valid field to search
		$valid = array('display_name', 'slug', 'email', 'telephone', 'description');

		// default we search for name only
		if (empty($field)) {
			$field = array('display_name');
		}
		$search = array_intersect($valid, $field);

		$filter = array_filter($filter);
		$status = 'active';

		$query = Query::table(static::table());

		if ($term) {
			// word
			//$query->where($search, 'REGEXP', '[[:<:]]' . $term . '[[:>:]]', true);
			$query->where($search, 'REGEXP', $term, true);
		}

		if (isset($filter['division'])) {

			//$query->left_join(Base::table('divisions'), Base::table('divisions.id'), '=', Base::table('staffs.division'));

			if (is_array($filter['division'])) {

				if (count($filter['division']) == 1 and !empty($filter['division'][0])) {
					$query->where('division', '=', $filter['division'][0]);
				} else {
					$query->where_in('division', $filter['division'], 'AND ');
				}
			}
			unset($filter['division']);
		}

		if (isset($filter['branch'])) {
			$query->where('branch', '=', $filter['branch']);
			unset($filter['branch']);
		}

		if (isset($filter['sector'])) {
			$query->where('sector', '=', $filter['sector']);
			unset($filter['sector']);
		}

		if (isset($filter['unit'])) {
			//$query->left_join(Base::table('units'), Base::table('units.id'), '=', Base::table('staffs.unit'))->where(Base::table('staffs.unit'), '=', $filter['unit']);
			$query->where('unit', '=', $filter['unit']);
			unset($filter['unit']);
		}


		if (isset($filter['status'])) {
			$status = $filter['status'];
			unset($filter['status']);
		}

		$query->where('status', '=', $status);

		//dd($query->get());
		//dd($query);

		$count = $query->count();

		$query->sort('grade', 'desc');

		$staffs = $query->take($per_page)
		->skip(--$page * $per_page)
		->get(array(static::fields()));

		return ($object) ? new Paginator($staffs, $count, $page, $per_page, Uri::to('admin/staffs')) : array($count, $staffs);
	}

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('grade', 'desc')->get(array(static::fields()));

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/staffs'));
	}

	public static function related($id, $page = 1, $perpage = 6) {

		$staff = static::find($id);

		$query = Query::table(static::table())->where('status', '=', 'active');

		if ($staff->grade > 48) {
			$query = $query->where('division', '=', $staff->division)
			->where('branch', '=', $staff->branch)
			->where('sector', '=', $staff->sector)
			->where('unit', '=', $staff->unit)
			->where('grade', '=', $staff->grade)
			->where('id', '<>', $staff->id)
			->or_where('report_to', '=', $staff->id);
		} elseif ($staff->grade < 41) {
			$query = $query->where('division', '=', $staff->division)
			->where('sector', '=', $staff->sector)
			->where('unit', '=', $staff->unit)
			->where('grade', '=', $staff->grade)
			->where('id', '<>', $staff->id)
			->or_where('report_to', '=', $staff->id);
		} else {
			$query = $query->where('division', '=', $staff->division)
			->where('grade', '=', $staff->grade)
			->where('id', '<>', $staff->id)
			->or_where('report_to', '=', $staff->id)
			->where('grade', '=', $staff->grade);
		}

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('grade', 'desc')->get(array(static::fields()));

		return new Paginator($results, $count, $page, $perpage, Uri::to('staffs'));
	}

}
