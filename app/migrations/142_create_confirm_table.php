<?php

class Migration_create_confirm_table extends Migration {

	public function up() {
		$table = Base::table('confirm');

		if( ! $this->has_table($table)) {
			$sql = "CREATE TABLE IF NOT EXISTS `$table` (
				`id` int(6) NOT NULL AUTO_INCREMENT,
				`staff_id` int(6) NOT NULL,
				`token` text NOT NULL,
				`confirm_date` datetime DEFAULT NULL,
				`created` datetime DEFAULT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB";

			DB::ask($sql);
		}
	}

	public function down() {}

}
