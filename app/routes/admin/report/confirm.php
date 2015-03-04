<?php

Route::collection(array('before' => 'auth,csrf,admin'), function() {

	Route::get(['admin/reports/confirm', 'admin/reports/confirm/(:num)'], function($page =1) {

		$input = filter_var_array(Input::get(array('from', 'to')), array(
		    'from' => FILTER_SANITIZE_SPECIAL_CHARS,
		    'to' => FILTER_SANITIZE_SPECIAL_CHARS
		));

		$input = array_filter($input);

		$vars['messages'] = Notify::read();
		$vars['confirms'] = Confirm::paginate($input, $page, Config::get('meta.staffs_per_page'));

		return View::create('reports/confirm', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');

	});

});
