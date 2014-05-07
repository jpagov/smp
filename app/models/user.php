<?php

class User extends Base {

	public static $table = 'staffs';

	public static function search($params = array()) {
		$query = static::where('account', '=', '1');

		foreach($params as $key => $value) {
			$query->where($key, '=', $value);
		}

		return $query->fetch();
	}

  public static function paginate($page = 1, $perpage = 10) {
    $query = Query::table(static::table());

    $count = $query->count();

    $results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('grade', 'desc')->get(array(Staff::fields()));

    $division_roles = array();

    foreach ($results as $user) {

      if ($staff_roles = Role::where('staff', '=', $user->id)->get(array('division'))) {
        foreach ($staff_roles as $div) {
          $division_roles[] = Division::find($div->division)->title;
        }
        $user->roles = $division_roles;
        unset($division_roles);
      } else {
        $user->roles = array();
      }

    }

    return new Paginator($results, $count, $page, $perpage, Uri::to('staffs'));
  }

}
