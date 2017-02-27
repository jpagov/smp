<?php

class Migration_add_hide_supervisor extends Migration {

	public function up() {

        $table = Base::table('hierarchies');

        if (!$this->has_table_column($table, 'id')) {
            $sql = 'ALTER TABLE `' . $table . '` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT';
            DB::ask($sql);
        }

        $table = Base::table('staffs');

        if ($this->has_table_column($table, 'display_name')) {
            $sql = 'ALTER TABLE `' . $table . '` ADD FULLTEXT(`display_name`)';
            DB::ask($sql);
        }

        if ($this->has_table_column($table, 'email')) {
            $sql = 'ALTER TABLE `' . $table . '` ADD FULLTEXT(`email`)';
            DB::ask($sql);
        }

        if (!$this->has_table_column($table, 'ic')) {
            $sql = 'ALTER TABLE `' . $table . '` ADD `id` VARCHAR(20) NULL DEFAULT NULL AFTER `password`';
            DB::ask($sql);
        }

        $table = Base::table('staffs_maps');

        if( ! $this->has_table($table)) {

			$sql = "CREATE TABLE IF NOT EXISTS `$table` (
			  `id` int(6) NOT NULL AUTO_INCREMENT,
			  `title` varchar(150) NOT NULL,
			  `title_en` varchar(150) NOT NULL,
			  `slug` varchar(150) NOT NULL,
			  `parent` int(11) DEFAULT NULL,
			  `description` text NOT NULL,
			  `view` int(11) NOT NULL,
			  `order` int(3) NOT NULL DEFAULT '99',
			  `staff` int(11) NOT NULL,
			  `street` text NOT NULL,
			  `city` varchar(50) NOT NULL,
			  `state` varchar(50) NOT NULL,
			  `zip` varchar(5) NOT NULL,
			  `telephone` text NOT NULL,
			  `fax` text NOT NULL,
			  ADD PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8";

			DB::ask($sql);

		}

	}

	public function down() {}

}
