<?php

Route::collection(array('before' => 'auth'), function() {

	/*
		List users
	*/
	Route::get(['admin/profile', 'admin/profile/(:num)'], function($id = null) {

		$profile = $id ? Staff::find($id) : Auth::user();

		//dd($profile);
		$vars['messages'] = Notify::read();
		$staffs = array();
		$vars['status'] = 'all';
		$vars['division'] = 'all';
		$vars['fields'] = Extend::fields('staff', $profile->id);


		$default_avatar = ($profile->gender == 'M') ?
                        'default-male.jpg' :
                        'default-female.jpg';

        $avatar = ($vars['fields'] && isset($vars['fields'][0]->value->filename)) ?
        $vars['fields'][0]->value->filename :
        $default_avatar;

        $profile->avatar = $avatar;

		$vars['profile'] = $profile;



		return View::create('profile/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});



});
