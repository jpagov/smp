<?php

Route::collection(array('before' => 'auth,csrf,admin'), function() {

	Route::get(['admin/reports/search', 'admin/reports/search/(:num)'], function($page =1) {

		$input = filter_var_array(Input::get(['term']), [
			'term' => FILTER_SANITIZE_SPECIAL_CHARS
		]);

		$input = array_filter($input);

		$vars['messages'] = Notify::read();
		$vars['searchs'] = Searchr::paginate($input, $page, Config::get('meta.staffs_per_page'));

		return View::create('reports/search', $vars)
			->partial('header', 'partials/header')
			->partial('search', 'partials/search', $vars)
			->partial('footer', 'partials/footer');

	});

});
