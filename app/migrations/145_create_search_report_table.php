<?php

class Migration_create_search_report_table extends Migration {

	public function up() {
		$table = Base::table('search_report');

		if( ! $this->has_table($table)) {
			$sql = "CREATE TABLE IF NOT EXISTS `$table` (
				`search` text NOT NULL,
				`total` int(11) NOT NULL,
				KEY `search` (`search`(150))
			) ENGINE=InnoDB";

			DB::ask($sql);
		}

		// grouping all existing search
		/*
		if ($searchs = Search::group('search')->sort('total', 'desc')->get_count(['search'], 'search')) {

			foreach ($searchs as $search) {
				Query::table($table)->insert([
					'search' => $search->search,
					'total' => $search->total]);
			}
		}
		*/
	}

	public function down() {}

}
