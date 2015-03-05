<?php

class Migration_insert_revision_meta extends Migration {

	public function up() {
		$table = Base::table('meta');

		if($this->has_table($table)) {

			Query::table($table)->insert([
				'key' => 'revision',
				'value' => 1
			]);

			Query::table($table)->insert([
				'key' => 'max_revision',
				'value' => 10
			]);

		}
	}

	public function down() {}

}
