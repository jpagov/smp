<?php

Route::collection(array('before' => 'auth,csrf'), function() {

	/*
		List users
	*/
	Route::get(array('admin/users', 'admin/users/(:num)'), function($page = 1) {
		$vars['messages'] = Notify::read();
		$vars['users'] = User::paginate($page, Config::get('meta.posts_per_page'));
		$vars['status'] = 'all';

		return View::create('users/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

  /*
    List users by status and paginate through them
  */
  Route::get(array(
    'admin/users/status/(:any)',
    'admin/users/status/(:any)/(:num)'), function($status, $page = 1) {

    $query = User::where('account', '=', '1')
      ->where('status', '=', $status);

    $perpage = Config::meta('posts_per_page');
    $total = $query->count();
    $users = $query->sort('grade', 'desc')->take($perpage)->skip(($page - 1) * $perpage)->get();
    $url = Uri::to('admin/users/status/' . $status);

    $pagination = new Paginator($users, $total, $page, $perpage, $url);

    $vars['messages'] = Notify::read();
    $vars['users'] = $pagination;
    $vars['status'] = $status;

    return View::create('users/index', $vars)
      ->partial('header', 'partials/header')
      ->partial('footer', 'partials/footer');

  });

	/*
		Edit user
	*/
	Route::get('admin/users/edit/(:num)', function($id) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['user'] = User::find($id);
    $vars['divisions'] = Division::dropdown();
    $division_roles = array();

    // get current staff division role
    if ($staff_roles = Role::where('staff', '=', $id)->get(array('division'))) {
      foreach ($staff_roles as $div) {
        $division_roles[] = $div->division;

      }
    }

    $vars['division_roles'] = $division_roles;

		$vars['statuses'] = array(
			'inactive' => __('global.inactive'),
			'active' => __('global.active')
		);

		$vars['roles'] = array(
			'administrator' => __('global.administrator'),
			'editor' => __('global.editor'),
			'staff' => __('global.staff')
		);

		return View::create('users/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/users/edit/(:num)', function($id) {
		$input = Input::get(array(
      'username',
      'email',
      'display_name',
      'status',
      'role')
    );

		$password_reset = false;

		if($password = Input::get('password')) {
			$input['password'] = $password;
			$password_reset = true;
		}

		$validator = new Validator($input);

		$validator->add('safe', function($str) use($id) {
			return ($str != 'inactive' and Auth::user()->id == $id);
		});

		$validator->check('username')
			->is_max(2, __('users.username_missing', 2));

		$validator->check('email')
			->is_email(__('users.email_missing'));

		if($password_reset) {
			$validator->check('password')
				->is_max(6, __('users.password_too_short', 6));
		}

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::error($errors);

			return Response::redirect('admin/users/edit/' . $id);
		}

    if($inputroles = Input::get('roles')) {

      $roles = array();
      Role::where('staff', '=', $id)->delete();

      foreach ($inputroles as $div) {
        $roles['staff'] = $id;
        $roles['division'] = $div;
        Role::create($roles);
      }
    }

		if($password_reset) {
			$input['password'] = Hash::make($input['password']);
		}

		User::update($id, $input);

		Notify::success(__('users.updated'));

		return Response::redirect('admin/users/edit/' . $id);
	});

	/*
		Add user
	*/
	Route::get('admin/users/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		$vars['statuses'] = array(
			'inactive' => __('global.inactive'),
			'active' => __('global.active')
		);

		$vars['roles'] = array(
			'administrator' => __('global.administrator'),
			'editor' => __('global.editor'),
			'user' => __('global.user')
		);

		return View::create('users/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/users/add', function() {
		$input = Input::get(array('username', 'email', 'real_name', 'password', 'bio', 'status', 'role'));

		$validator = new Validator($input);

		$validator->check('username')
			->is_max(2, __('users.username_missing', 2));

		$validator->check('email')
			->is_email(__('users.email_missing'));

		$validator->check('password')
			->is_max(6, __('users.password_too_short', 6));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::error($errors);

			return Response::redirect('admin/users/add');
		}

		$input['password'] = Hash::make($input['password']);

		User::create($input);

		Notify::success(__('users.created'));

		return Response::redirect('admin/users');
	});

	/*
		Delete user
	*/
	Route::get('admin/users/delete/(:num)', function($id) {
		$self = Auth::user();

		if($self->id == $id) {
			Notify::error(__('users.delete_error'));

			return Response::redirect('admin/users/edit/' . $id);
		}

		User::where('id', '=', $id)->delete();

		Notify::success(__('users.deleted'));

		return Response::redirect('admin/users');
	});

});
