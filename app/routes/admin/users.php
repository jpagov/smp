<?php

Route::collection(array('before' => 'auth,admin,csrf'), function() {

	/*
		List users
	*/
	Route::get(array('admin/users', 'admin/users/(:num)'), function($page = 1) {
		$vars['messages'] = Notify::read();
		$vars['users'] = User::paginate($page, Config::get('meta.staffs_per_page'));
		$vars['status'] = 'all';

		return View::create('users/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

});
