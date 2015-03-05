<?php

class Migration_create_tags_table extends Migration {

	public function up() {
		$table = Base::table('tags');

		if( ! $this->has_table($table)) {
			$sql = "CREATE TABLE IF NOT EXISTS `$table` (
				`id` int(6) NOT NULL AUTO_INCREMENT,
				`title` varchar(150) NOT NULL,
				`slug` varchar(150) NOT NULL,
				`created` datetime NOT NULL,
				`view` int(11) NOT NULL,
				PRIMARY KEY (`id`),
				KEY `title` (`title`),
				KEY `slug` (`slug`)
			) ENGINE=InnoDB";

			DB::ask($sql);
		}

		$table = Base::table('staff_tag');

		if( ! $this->has_table($table)) {
			$sql = "CREATE TABLE IF NOT EXISTS `$table` (
				`id` int(6) NOT NULL AUTO_INCREMENT,
				`staff` int(6) NOT NULL,
				`tag` int(6) NOT NULL,
				PRIMARY KEY (`id`),
				KEY `staff` (`staff`),
				KEY `tag` (`tag`)
			) ENGINE=InnoDB";

			DB::ask($sql);
		}

		// by default insert all category in tags
		if ($categories = Category::get()) {

			foreach ($categories as $category) {

				Query::table(Base::table('tags'))->insert([
					'title' => $category->title,
					'slug' => $category->slug,
					'created' => Date::mysql('now'),
				]);

			}
		}

	}

	public function down() {}

}
