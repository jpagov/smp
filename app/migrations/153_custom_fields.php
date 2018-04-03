<?php

class Migration_custom_fields extends Migration
{
    public function up()
    {
        $table = Base::table('extend');

        if ($this->has_table($table)) {
            $fields = [
                'image' => [
                    'Avatar',
                ],
                'text' => [
                    'Twitter',
                    'Facebook',
                    'Google Plus',
                    'GitHub',
                    'Hide Avatar',
                ],
            ];

            foreach ($fields as $type => $keys) {
                foreach ($keys as $label) {
                    $key = slug($label, '_');
                    if (Query::table($table)->where('key', '=', $key)->count() == 0) {
                        Query::table($table)->insert(array(
                            'type' => 'staff',
                            'field' => $type,
                            'key' => $key,
                            'label' => $label,
                        ));
                    }
                }
            }

            if ($this->has_table_column($table, 'avatar')) {
                Query::table($table)->where('key', '=', 'avatar')->update(array('attributes' => '{"type":"jpg","size":{"width":"160","height":"160"}}'));
            }
        }

        $table = Base::table('meta');

        if ($this->has_table($table)) {
            $metas = [
                'custom_kppa' => 1,
                'custom_tkppap' => 1,
                'custom_tkppao' => 1,
                'custom_tour' => 1,
                'custom_ip_low' => '10.21.0.0',
                'custom_ip_high' => '10.21.255.255',
                'home_page' => 1,
                'show_direct_report' => 1,
                'show_division_meta' => 1,
                'show_hierarchy' => 1,
                'show_message' => 1,
                'show_personal_assistant' => 1,
                'show_rating' => 1,
                'show_social' => 1,
                'staffs_page' => 1,
                'management_page' => 1,
                'category' => 0,
                'auto_published_comments' => 0,
                'comment_notifications' => 0,
                'comment_moderation_keys' => 0,
            ];

            foreach ($metas as $meta => $value) {
                if (Query::table($table)->where('key', '=', $meta)->count() == 0) {
                    Query::table($table)->insert(array(
                        'key' => $meta,
                        'value' => $value,
                    ));
                }
            }

            $customs = [];
        }
    }

    public function down()
    {
    }
}
