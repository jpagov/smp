<?php

class Migration_add_hide_supervisor extends Migration {

	public function up() {

        $table = Base::table('hierarchies');

        if (!$this->has_table_column($table, 'id')) {
            $sql = 'ALTER TABLE `' . $table . '` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT';
            DB::ask($sql);
        }

	}

	public function down() {}

}
