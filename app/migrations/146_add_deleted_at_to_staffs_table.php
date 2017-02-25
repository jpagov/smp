<?php

class Migration_add_deleted_at_to_staffs_table extends Migration {

	public function up() {
		$table = Base::table('staffs');

		if (!$this->has_table_column($table, 'deleted_at')) {
            $sql = 'ALTER TABLE `' . $table . '` ADD `deleted_at` TIMESTAMP NULL DEFAULT NULL AFTER `message`';
            DB::ask($sql);
        }

        $table = Base::table('revisions');

        if (!$this->has_table_column($table, 'deleted_at')) {
            $sql = 'ALTER TABLE `' . $table . '` ADD `deleted_at` TIMESTAMP NULL DEFAULT NULL AFTER `message`';
            DB::ask($sql);
        }

        $table = Base::table('extend');

        if( ! $this->has_table($table)) {

        	$hide_supervisor = 'hide_supervisor';

			if(Query::table($table)->where('key', '=', $key)->count() == 0) {

				Query::table($table)->insert(array(
					'type' => 'staff',
					'field' => 'text',
					'key' => $key,
					'label' => 'Hide Supervisor',
				));
			}
        }

	}

	public function down() {}

}
