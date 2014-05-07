<?php

Route::collection(array('before' => 'auth,csrf'), function() {

	/*
		List all plugins
	*/
	Route::get('admin/setting/plugins', function($page = 1) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		return View::create('setting/plugins/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

});
