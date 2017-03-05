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

	$table = Base::table('divisions');

	if ($this->has_table_column($table, 'view')) {
            $sql = 'ALTER TABLE `' . $table . '` CHANGE `view` `view` INT(6) NOT NULL DEFAULT \'1\'';
            DB::ask($sql);
        }

        if ($this->has_table_column($table, 'staff')) {
            $sql = 'ALTER TABLE `' . $table . '` CHANGE `staff` `staff` INT(6) NULL DEFAULT \'0\'';
            DB::ask($sql);
        }

        $fields = [
		'street' => 'TEXT',
		'city' => 'VARCHAR(50)',
		'state' => 'VARCHAR(50)',
		'zip' => 'VARCHAR(5)',
		'telephone' => 'VARCHAR(250)',
		'fax' => 'VARCHAR(50)',
        ];

        foreach ($fields as $field => $schema) {
		if ($this->has_table_column($table, $field)) {
	            $sql = 'ALTER TABLE `' . $table . '` CHANGE `'. $field . '` `'. $field . '` ' . $schema . ' NULL DEFAULT NULL';
	            DB::ask($sql);
	        }
        }

        foreach (['divisions', 'branchs', 'sectors', 'units'] as $type) {

		$table = Base::table($type);

	        if ($this->has_table_column($table, 'description')) {
	            $sql = 'ALTER TABLE `' . $table . '` CHANGE `description` `description` TEXT NULL DEFAULT NULL';
	            DB::ask($sql);
	        }
        }

	}

	public function down() {}

}
