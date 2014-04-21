<?php

Route::collection(array('before' => 'auth,csrf'), function() {

	/*
		List staffs
	*/
	Route::get(array('admin/staffs', 'admin/staffs/(:num)'), function($page = 1) {
		$vars['messages'] = Notify::read();
		$vars['staffs'] = Staff::paginate($page, Config::get('meta.posts_per_page'));
		$vars['status'] = 'all';

		return View::create('staffs/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	/*
		Edit staff
	*/
	Route::get('admin/staffs/edit/(:num)', function($id) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['staff'] = Staff::find($id);

		$vars['genders'] = array(
			'M' => __('staff.male'),
			'F' => __('staff.female')
		);

		$vars['statuses'] = array(
			'inactive' => __('global.inactive'),
			'active' => __('global.active')
		);

		$vars['roles'] = array(
			'administrator' => __('global.administrator'),
			'editor' => __('global.editor'),
			'staff' => __('global.staff')
		);

		return View::create('staffs/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/staffs/edit/(:num)', function($id) {
		$input = Input::get(array('staffname', 'email', 'real_name', 'bio', 'status', 'role'));
		$password_reset = false;

		if($password = Input::get('password')) {
			$input['password'] = $password;
			$password_reset = true;
		}

		$validator = new Validator($input);

		$validator->add('safe', function($str) use($id) {
			return ($str != 'inactive' and Auth::staff()->id == $id);
		});

		$validator->check('staffname')
			->is_max(2, __('staffs.staffname_missing', 2));

		$validator->check('email')
			->is_email(__('staffs.email_missing'));

		if($password_reset) {
			$validator->check('password')
				->is_max(6, __('staffs.password_too_short', 6));
		}

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::error($errors);

			return Response::redirect('admin/staffs/edit/' . $id);
		}

		if($password_reset) {
			$input['password'] = Hash::make($input['password']);
		}

		Staff::update($id, $input);

		Notify::success(__('staffs.updated'));

		return Response::redirect('admin/staffs/edit/' . $id);
	});

	/*
		Add staff
	*/
	Route::get('admin/staffs/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		$vars['statuses'] = array(
			'inactive' => __('global.inactive'),
			'active' => __('global.active')
		);

		$vars['roles'] = array(
			'administrator' => __('global.administrator'),
			'editor' => __('global.editor'),
			'staff' => __('global.staff')
		);

		return View::create('staffs/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/staffs/add', function() {
		$input = Input::get(array('staffname', 'email', 'real_name', 'password', 'bio', 'status', 'role'));

		$validator = new Validator($input);

		$validator->check('staffname')
			->is_max(2, __('staffs.staffname_missing', 2));

		$validator->check('email')
			->is_email(__('staffs.email_missing'));

		$validator->check('password')
			->is_max(6, __('staffs.password_too_short', 6));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::error($errors);

			return Response::redirect('admin/staffs/add');
		}

		$input['password'] = Hash::make($input['password']);

		Staff::create($input);

		Notify::success(__('staffs.created'));

		return Response::redirect('admin/staffs');
	});

	/*
		Delete staff
	*/
	Route::get('admin/staffs/delete/(:num)', function($id) {
		$self = Auth::staff();

		if($self->id == $id) {
			Notify::error(__('staffs.delete_error'));

			return Response::redirect('admin/staffs/edit/' . $id);
		}

		Staff::where('id', '=', $id)->delete();

		Notify::success(__('staffs.deleted'));

		return Response::redirect('admin/staffs');
	});

});