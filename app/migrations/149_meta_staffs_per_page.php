<?php

class Migration_meta_staffs_per_page extends Migration
{
    public function up()
    {
        $table = Base::table('meta');

        if ($this->has_table($table)) {
            if (! Query::table($table)->where('key', '=', 'staffs_per_page')->count()) {
                Query::table($table)->insert(array(
                    'key' => 'staffs_per_page',
                    'value' => 15
                ));
            } else {
                Query::table($table)->where('key', '=', 'staffs_per_page')->update(array('value' => 15));
            }
        }
    }

    public function down()
    {
    }
}
