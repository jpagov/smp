<?php

Route::collection(array('before' => 'auth,admin,csrf'), function() {

	/*
		List users
	*/
	Route::get(array('admin/users', 'admin/users/(:num)'), function($page = 1) {

		$input = array_filter(filter_var_array(Input::get(array('division', 'status')), array(
		    'division' => FILTER_SANITIZE_SPECIAL_CHARS,
		    'status' => FILTER_SANITIZE_SPECIAL_CHARS
		)));


		$staffs = array();
		$vars['status'] = 'all';
		$vars['division'] = 'all';

		if (isset($input['status'])) {
			$vars['status'] = $input['status'];
		}

		if (isset($input['division']) and $input['division'] == 'all') {
			unset($input['division']);
		}

		if (isset($input['division'])) {

			$division = Division::slug($input['division']);
			$vars['division'] = $division->slug;

			$input['division'] = $division->id;

			$roles = Role::admin($input['division']);

			foreach ($roles->results as $role) {
				$staffs[] = $role->staff;
			}
			unset($input['division']);
		}

		$vars['messages'] = Notify::read();

		$vars['users'] = ($staffs) ?
		User::admin($staffs, $page, Config::get('meta.staffs_per_page')) :
		User::paginate($input, $page, Config::get('meta.staffs_per_page'));

		$vars['divisions'] = Division::listing();


		return View::create('users/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});



});
