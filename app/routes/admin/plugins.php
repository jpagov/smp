<?php

Route::collection(array('before' => 'auth,admin,csrf'), function() {

	/*
		List all plugins
	*/
	Route::get('admin/setting/plugins', function($page = 1) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		if (!$extend_exist = Meta::where('staff', '=', 487)->where('extend', '=', 1)->fetch(array('id'))) {
    		print_r('insert');
    	} else {
    		dd($extend_exist->id);
    	}

		return View::create('setting/plugins/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

});
