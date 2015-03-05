<?php

class Migration_insert_revision_meta extends Migration {

	public function up() {
		$table = Base::table('meta');

		if($this->has_table($table)) {

			$key = 'revision';

			if(Query::table($table)->where('key', '=', $key)->count() == 0) {
				Query::table($table)->insert(array('key' => $key, 'value' => 1));
			}

			$key = 'max_revision';

			if(Query::table($table)->where('key', '=', $key)->count() == 0) {
				Query::table($table)->insert(array('key' => $key, 'value' => 10));
			}

		}
	}

	public function down() {}

}
