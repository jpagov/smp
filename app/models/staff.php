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
		if ( $staff = static::where('display_name', 'like', $name)->fetch()) {
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

	public static function search($term, $page = 1, $per_page = 10, $filter = null, $division = null, $branch = null, $sector = null, $unit = null) {

		$search = array('slug', 'email', 'telephone', 'description');

		if ($filter) {
			$search = array_merge($filter, $search);
		}


		$query = Query::table(static::table());

		if ($division) {
			$query = $query->left_join(Base::table('divisions'), Base::table('divisions.id'), '=', Base::table('staffs.division'))->where(Base::table('staffs.division'), '=', $division);
		}

		if ($branch) {
			$query = $query->left_join(Base::table('branchs'), Base::table('branchs.id'), '=', Base::table('staffs.branch'))->where(Base::table('staffs.branch'), '=', $branch);
		}

		if ($sector) {
			$query = $query->left_join(Base::table('sectors'), Base::table('sectors.id'), '=', Base::table('staffs.sector'))->where(Base::table('staffs.sector'), '=', $sector);
		}

		if ($unit) {
			$query = $query->left_join(Base::table('units'), Base::table('units.id'), '=', Base::table('staffs.unit'))->where(Base::table('staffs.unit'), '=', $unit);
		}

		$query = $query->where(Base::table('staffs.status'), '=', 'active')
		->where(Base::table('staffs.display_name'), 'like', '%' . $term . '%');

		if ($search) {
			foreach($search as $value) {
				$query = $query->or_where(Base::table('staffs.' . $value), 'like', '%' . $term . '%');
			}
		}

		$total = $query->count();

		$staffs = $query->take($per_page)
		->skip(--$page * $per_page)
		->get(array(static::fields()));

		return array($total, $staffs);
	}

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('grade', 'desc')->get(array(static::fields()));

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/staffs'));
	}

	public static function related($id, $page = 1, $perpage = 6) {

		$staff = static::find($id);

		$query = Query::table(static::table());

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
