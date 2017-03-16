<?php

class Migration_add_sort_column extends Migration
{
	public function up() {

	    foreach (['branchs', 'sectors', 'units'] as $type) {

			$table = Base::table($type);

	        if (!$this->has_table_column($table, 'sort')) {
	            $sql = 'ALTER TABLE `' . $table . '` ADD `sort` TINYINT(3) NULL DEFAULT NULL AFTER `description`';
	            DB::ask($sql);
	        }

	        // make Pejabat Pengarah on top order
	        if ($branch = Branch::find(1)) {
	        	$branch->sort = 1;
	        	$branch->save();
	        }
	    }
	}

    public function down()
    {
    }
}
