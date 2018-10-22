<?php

class Migration_cidrs extends Migration
{
    public function up()
    {
        $table = Base::table('meta');

        if ($this->has_table($table)) {
            if (! Query::table($table)->where('key', '=', 'cidrs')->count()) {
                Query::table($table)->insert(array(
                    'key' => 'cidrs',
                    'value' => '10.21.0.0/16,10.217.24.0/24,10.188.2.0/24'
                ));
            }
        }
    }

    public function down()
    {
    }
}
