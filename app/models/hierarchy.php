<?php

class Hierarchy extends Base {

	public static $table = 'hierarchies';

  public static function search($params = array()) {
    $query = Query::table(static::table());

    foreach($params as $key => $value) {
      $query->where($key, '=', $value);
    }

    return $query->fetch();
  }

  public static function division( $hierarchy = 'branchs', $division = null, $branch = null, $sector = null) {

    $query = static::left_join(Base::table($hierarchy), Base::table('hierarchies.' . substr($hierarchy, 0, -1)), '=', Base::table($hierarchy . '.id'));

    $query->where(Base::table('hierarchies.' . substr($hierarchy, 0, -1)), '!=', 0);

    if ($division) {
      $query->where(Base::table('hierarchies.division'), '=', $division);
    }

    if ($branch) {
      $query->where(Base::table('hierarchies.branch'), '=', $branch);
    }

    if ($sector) {
      $query->where(Base::table('hierarchies.sector'), '=', $sector);
    }

    $query->group(Base::table($hierarchy . '.title'));

    return $query->get(array(Base::table($hierarchy . '.id'), Base::table($hierarchy . '.title')));
  }

  public static function branch($division = null) {
    return static::division('branchs', $division);
  }

  public static function sector($division = null, $branch = null) {
    return static::division('sectors', $division, $branch);
  }

  public static function unit($division = null, $branch = null, $sector = null) {
    return static::division('units', $division, $branch, $sector);
  }

  public static function paginate($page = 1, $perpage = 10, $uri = null) {

    $uri = ($uri) ? $uri : Uri::to('admin/hierarchies');
    $query = Query::table(static::table());
    $count = $query->count();
    $results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('id')->get();

    return new Paginator($results, $count, $page, $perpage, Uri::to('admin/hierarchies'));
  }

}
