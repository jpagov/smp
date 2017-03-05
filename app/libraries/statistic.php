<?php

class Statistic extends Migration {

	public function tables($table = 'stats') {
		$default = Config::db('default');
		$db = Config::db('connections.' . $default . '.database');

		$sql = "SHOW TABLES FROM `$db` WHERE `Tables_in_$db` LIKE '%$table%' AND `Tables_in_$db` NOT LIKE '%report%'";

		list($result, $statement) = DB::ask($sql);
		$statement->setFetchMode(PDO::FETCH_NUM);

		$tables = array();

		foreach($statement->fetchAll() as $row) {
			$tables[] = $row[0];
		}

		return $tables;
	}

	public function up() {

		$table = Base::table('stats_' . Date::format('now', 'mY'));
		$stats = Base::table('stats');

		if( ! $this->has_table($stats)) {

			$sql = "CREATE TABLE IF NOT EXISTS `$stats` (
				`id` int(12) NOT NULL AUTO_INCREMENT,
				`trend` int(6) NOT NULL,
				`created` datetime NOT NULL,
				`type` varchar(16) NOT NULL,
				PRIMARY KEY (`id`),
				KEY `trend` (`trend`),
				KEY `created` (`created`),
				KEY `type` (`type`)
			) ENGINE=InnoDB";

			DB::ask($sql);

		}

		$sql = "SELECT `AUTO_INCREMENT`
				FROM  INFORMATION_SCHEMA.TABLES
				WHERE TABLE_SCHEMA = 'smp'
				AND   TABLE_NAME   = '$stats'";

		list($result, $statement) = DB::ask($sql);
		$statement->setFetchMode(PDO::FETCH_OBJ);

		$increment = $statement->fetchAll()[0]->AUTO_INCREMENT;
		$increment = (int) $increment + 1;

		if( ! $this->has_table($table)) {

			$sql = "RENAME TABLE `$stats` TO `$table`; CREATE TABLE IF NOT EXISTS `$stats` (
				`id` int(12) NOT NULL AUTO_INCREMENT,
				`trend` int(6) NOT NULL,
				`created` datetime NOT NULL,
				`type` varchar(16) NOT NULL,
				PRIMARY KEY (`id`),
				KEY `trend` (`trend`),
				KEY `created` (`created`),
				KEY `type` (`type`)
			) ENGINE=InnoDB AUTO_INCREMENT=$increment";

			DB::ask($sql);

		}
	}

	public function down() {}

}
