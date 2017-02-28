<?php

class Migration_db_revisited extends Migration {

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
            $sql = 'ALTER TABLE `' . $table . '` ADD `ic` VARCHAR(20) NULL DEFAULT NULL AFTER `password`';
            DB::ask($sql);
        }

        $table = Base::table('revisions');

        if (!$this->has_table_column($table, 'ic')) {
            $sql = 'ALTER TABLE `' . $table . '` ADD `ic` VARCHAR(20) NULL DEFAULT NULL AFTER `password`';
            DB::ask($sql);
        }

	}

	public function down() {}

}
