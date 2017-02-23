<?php

class Migration_add_hide_supervisor extends Migration {

	public function up() {

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
