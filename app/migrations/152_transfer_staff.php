<?php

class Migration_transfer_staff extends Migration
{
	public function up() {

		$table = Base::table('transfers');

		if( ! $this->has_table($table)) {
			$sql = "CREATE TABLE IF NOT EXISTS `$table` (
				`id` int(6) NOT NULL AUTO_INCREMENT,
				`staff_id` int(6) UNSIGNED NOT NULL,
				`transfer_from` int(6) UNSIGNED NOT NULL,
				`transfer_to` int(6) UNSIGNED NOT NULL,
				`transfer_by` int(6) UNSIGNED NOT NULL,
				`transfered_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
				`confirmed_by` INT(6) UNSIGNED NULL DEFAULT NULL,
				`confirmed_at` TIMESTAMP NULL DEFAULT NULL,
				`status` ENUM('transfer','confirm','cancel') NOT NULL DEFAULT 'transfer',
				PRIMARY KEY (`id`),
				KEY `staff_id` (`staff_id`)
			) ENGINE=InnoDB";

			DB::ask($sql);
		}

		$table = Base::table('meta');

        if ($this->has_table($table)) {
            if (! Query::table($table)->where('key', '=', 'custom_transfer_email')->count()) {
                Query::table($table)->insert([
                    'key' => 'custom_transfer_email',
                    'value' => 1
                ]);
            } else {
                Query::table($table)->where('key', '=', 'custom_transfer_email')->update(['value' => 1]);
            }

            if (! Query::table($table)->where('key', '=', 'custom_transfer_days_expired')->count()) {
                Query::table($table)->insert([
                    'key' => 'custom_transfer_days_expired',
                    'value' => 7
                ]);
            } else {
                Query::table($table)->where('key', '=', 'custom_transfer_days_expired')->update(['value' => 7]);
            }
        }

	}

    public function down()
    {
    	$table = Base::table('staffs');

        if ($this->has_table_column($table, 'status')) {
            $sql = "ALTER TABLE `$table` CHANGE `status` `status` ENUM('inactive','active') NOT NULL DEFAULT 'active'";
            DB::ask($sql);
        }
    }
}
