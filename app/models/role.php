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

  private static function get($row, $val) {
    return static::where($row, '=', $val)->fetch();
  }

}
