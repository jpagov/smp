<?php
set_time_limit(0);

Route::collection(array('before' => 'auth,admin'), function() {

	Route::get(array('admin/cron/slug', 'admin/cron/slug/(:num)'), function($page = 1) {

		$slugify = function($text = '') {
			$text = str_replace('-', ' ', $text);
			if (str_word_count($text) < 3) return $text;
			return preg_replace('~\b(\w)|.~', '$1', $text);
		};

		$loop = round(Branch::count()/10);
		$branchs = Branch::paginate($page, 10);

		foreach ($branchs->results as $branch) {

			// backup
			if (str_word_count($branch->title) > 2) {

				Slug::where('title', 'like', $branch->title)
					->where('type', '=', 'branch')->delete();

				Slug::create(array(
					'realid' => $branch->id,
					'title' => $branch->title,
					'slug' => $branch->slug,
					'type' => 'branch',
				));

				Branch::update($branch->id, array(
					'slug' => slug($slugify($branch->title))
				));

			}

		}

		if ($page < $loop) {
			sleep(1);
			return Response::redirect('admin/cron/slug/' . ($page+1) );
		}

	});
});
