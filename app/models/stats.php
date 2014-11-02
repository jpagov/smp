<?php

class Stats extends Base {

	public static $table = 'stats';

	private static function get($row, $val) {
		return static::where($row, '=', $val)->fetch();
	}

	public static function log($id, $type) {

		$stats = parent::create(array(
			'trend' => $id,
			'created' => Date::mysql('now'),
			'type' => $type
		));

		return $stats;
	}

	public static function listing($type = 'staff', $date = null, $page = 1, $per_page = 10, $order = 'DESC') {

		$sqldate = '';
		$prepare = array();

		$table = 'staffs';
		$field = 'display_name';

		if ($type == 'category') {
			$table = 'categories';
			$field = 'title';
		}

		if ($type == 'division') {
			$table = 'divisions';
			$field = 'title';
		}

		if ($type == 'search') {
			$table = 'search';
			$field = 'search';
		}

		$prepare = array($type);

		if (is_array($date) and isset($date['start']) and isset($date['end'])) {
			$sqldate = ' AND (' . Base::table('stats.created') . ' BETWEEN ? AND ?) ';
			$prepare[] =  $date['end'];
			$prepare[] =  $date['start'];
		}

		//print_r($prepare);

		$sql = 'SELECT ' . Base::table($table . '.' . $field . ' as trend') . ', COUNT(' . Base::table('stats.trend') . ') AS `stats` FROM ' . Base::table('stats') . '
			LEFT JOIN ' . Base::table($table) . ' ON (' . Base::table($table . '.id') . ' = ' . Base::table('stats.trend') . ')
			WHERE ' . Base::table('stats.type') . ' = ? ' . $sqldate . '
			GROUP BY ' . Base::table($table . '.' . $field) . '
			ORDER BY `stats` '. $order .', ' . Base::table('stats.created') . ' DESC
			LIMIT ' . $per_page . ' OFFSET ' . (($page - 1) * $per_page) . '
		';

		//print_r($sql);
		list($result, $statement) = DB::ask($sql, $prepare);

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}



}
