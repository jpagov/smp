<?php

class Migration_meta_related extends Migration
{
    public function up()
    {
        $table = Base::table('meta');

        if ($this->has_table($table)) {

            if (! Query::table($table)->where('key', '=', 'related_per_page')->count()) {
                Query::table($table)->insert(array(
                    'key' => 'related_per_page',
                    'value' => 7
                ));
            } else {
                Query::table($table)->where('key', '=', 'related_per_page')->update(array('value' => 7));
            }

            if (! Query::table($table)->where('key', '=', 'related_min_grade')->count()) {
                Query::table($table)->insert(array(
                    'key' => 'related_min_grade',
                    'value' => 41
                ));
            } else {
                Query::table($table)->where('key', '=', 'related_min_grade')->update(array('value' => 41));
            }

        }
    }

    public function down()
    {
    }
}
