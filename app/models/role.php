<?php

class Role extends Base {

	public static $table = 'roles';

  public static function staff($staff) {
    $divisions = array();
    $roles = static::where('staff', '=', $staff)->get();
    foreach ($roles as $role) {
      $divisions[] = $role->division;
    }
    return $divisions;
  }

  public static function admin($division = null, $page = 1, $per_page = 10) {
		// get total
		$query = static::left_join(
					Base::table('staffs'),
					Base::table('staffs.id'), '=', Base::table('roles.staff')
				)->where('status', '=', 'active');

		if (empty($division) or $division == 'all') {
			$division = 0;
		}

		if($division) {
			$query = $query->where(Base::table('roles.division'), '=', $division);
		}

		$total = $query->count();

		$query = $query->group(Base::table('roles.staff'));

		// get roles
		$roles = $query->sort(Base::table('roles.id'), 'desc')
			->take($per_page)
			->skip(--$page * $per_page)
			->get(array(Base::table('roles.*'),
				Base::table('staffs.display_name as name')));

		return new Paginator($roles, $total, $page, $per_page, Uri::to('admin/users'));

	}

  private static function get($row, $val) {
    return static::where($row, '=', $val)->fetch();
  }

}
