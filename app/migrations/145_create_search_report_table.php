<?php

class Migration_create_search_report_table extends Migration {

	public function up() {
		$table = Base::table('search_report');

		if( ! $this->has_table($table)) {
			$sql = "CREATE TABLE IF NOT EXISTS `$table` (
				`id` int(6) NOT NULL AUTO_INCREMENT,
				`search` text NOT NULL,
				`total` int(11) NOT NULL,
				PRIMARY KEY (`id`),
				KEY `search` (`search`(150))
			) ENGINE=InnoDB";

			DB::ask($sql);
		}
	}

	public function down() {}

}
