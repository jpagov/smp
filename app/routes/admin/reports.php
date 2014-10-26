<?php

Route::collection(array('before' => 'auth,admin,csrf'), function() {

	/*
		Admin reports
	*/
	Route::get('admin/reports', function() {

		$vars['messages'] = Notify::read();

		$input = filter_var_array(Input::get(array('trend')), array(
		    'trend' => FILTER_SANITIZE_SPECIAL_CHARS
		));

		$input = array_filter($input);

		$trend = ($input) ? $input['trend'] : 'D';
		$vars['trend'] = $trend;
		$period = 1;

		$date = array();

		if ($trend) {
			$interval = 'P1' . strtoupper($trend);

			if ($trend == 'H') {
				$interval = 'PT1' . $trend;
			}

			$date['start'] = Date::mysql('now');
			$end = new DateTime($date['start']);
			$end->sub(new DateInterval($interval));
			$date['end'] = $end->format('Y-m-d H:i:s');
		}


		// Trending
		$vars['staffs'] = Stats::listing('staff', $date, 1, 5);
		$vars['divisions'] = Stats::listing('division', $date, 1, 5);
		$vars['categories'] = Stats::listing('category', $date, 1, 5);
		$vars['searchs'] = Stats::listing('search', $date, 1, 5);

		// Trending
		$vars['top_staffs'] = Stats::listing('staff', null, 1, 5);
		$vars['top_divisions'] = Stats::listing('division', null, 1, 5);
		$vars['top_categories'] = Stats::listing('category', null, 1, 5);
		$vars['top_searchs'] = Stats::listing('search', null, 1, 5);

		// Last access, recent add, recent update
		$vars['access'] = Staff::where('account', '=', 1)
			->sort('last_visit', 'desc')
			->take(5)
			->get(array('display_name', 'role', 'last_visit'));

		$vars['adds'] = Staff::sort('created', 'desc')
			->take(5)->get(array('email', 'telephone', 'display_name', 'role', 'created'));

		$vars['updates'] = Staff::sort('updated', 'desc')
			->take(5)->get(array('email', 'telephone', 'display_name', 'role', 'updated'));

		$vars['status'] = 'all';
		$vars['trends'] = array(
			'H' => __('reports.hour'), // default
        	'D' => __('reports.day'),
        	'W' => __('reports.week'),
        	'M' => __('reports.month'),
        	'Y' => __('reports.year')
        );

		return View::create('reports/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::get('admin/reports/staff', function() {
		print_r('admin/reports/staff'); exit();
	});

	Route::get('admin/reports/category', function() {
		print_r('admin/reports/category'); exit();
	});

	Route::get('admin/reports/division', function() {
		print_r('admin/reports/division'); exit();
	});

	Route::get('admin/reports/branch', function() {
		print_r('admin/reports/branch'); exit();
	});

	Route::get('admin/reports/sector', function() {
		print_r('admin/reports/sector'); exit();
	});

	Route::get('admin/reports/unit', function() {
		print_r('admin/reports/unit'); exit();
	});

});
