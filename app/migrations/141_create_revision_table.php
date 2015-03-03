<?php

class Migration_create_revision_table extends Migration {

	public function up() {
		$table = Base::table('revisions');

		if( ! $this->has_table($table)) {
			$sql = "CREATE TABLE IF NOT EXISTS `$table` (
				`id` int(6) NOT NULL AUTO_INCREMENT,
				`staff_id` int(6) NOT NULL,
				`username` varchar(100) DEFAULT NULL,
				`password` text,
				`slug` varchar(150) NOT NULL,
				`salutation` text,
				`first_name` varchar(150) NOT NULL,
				`last_name` varchar(150) NOT NULL,
				`display_name` text NOT NULL,
				`gender` enum('M','F') NOT NULL,
				`job_title` varchar(150) NOT NULL,
				`position` varchar(16) NOT NULL,
				`management` tinyint(1) NOT NULL DEFAULT '0',
				`jusa` varchar(10) DEFAULT NULL,
				`report_to` int(6) DEFAULT NULL,
				`personal_assistant` int(6) DEFAULT NULL,
				`description` text NOT NULL,
				`scheme` int(6) NOT NULL,
				`grade` tinyint(3) NOT NULL,
				`division` int(6) NOT NULL,
				`branch` int(6) NOT NULL,
				`sector` int(6) NOT NULL,
				`unit` int(6) NOT NULL,
				`email` varchar(140) NOT NULL,
				`telephone` varchar(32) NOT NULL,
				`fax` varchar(32) NOT NULL,
				`status` enum('inactive','active','delete') NOT NULL,
				`role` enum('administrator','editor','staff') NOT NULL DEFAULT 'staff',
				`account` tinyint(1) NOT NULL DEFAULT '0',
				`sort` tinyint(2) DEFAULT NULL,
				`view` int(8) NOT NULL DEFAULT '0',
				`created` datetime NOT NULL,
				`updated` datetime DEFAULT NULL,
				`admin` int(6) NOT NULL,
				`revision_date` datetime DEFAULT NULL,
				`last_visit` datetime DEFAULT NULL,
				`rating` tinyint(1) NOT NULL DEFAULT '1',
				`message` tinyint(1) NOT NULL DEFAULT '1',
				`extend` text,
				PRIMARY KEY (`id`),
				KEY `first_name` (`first_name`),
				KEY `last_name` (`last_name`)
			) ENGINE=InnoDB";

			DB::ask($sql);
		}
	}

	public function down() {}

}
