<?php

class Migration_add_hide_supervisor extends Migration {

	public function up() {

        $table = Base::table('extend');

        if( $this->has_table($table)) {

		if ($this->has_table_column($table, 'attributes')) {
	            $sql = 'ALTER TABLE `' . $table . '` CHANGE `attributes` `attributes` TEXT NULL DEFAULT NULL';
	            DB::ask($sql);
	        }

		if (!$this->has_table_column($table, 'hide_supervisor')) {
	            Query::table($table)->insert(array(
					'type' => 'staff',
					'field' => 'text',
					'key' => 'hide_supervisor',
					'label' => 'Hide Supervisor',
				));
	        }
        }

	}

	public function down() {}

}
