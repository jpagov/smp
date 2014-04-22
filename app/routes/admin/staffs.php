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
    List staffs by status and paginate through them
  */
  Route::get(array(
    'admin/staffs/status/(:any)',
    'admin/staffs/status/(:any)/(:num)'), function($status, $page = 1) {

    $query = Staff::where('status', '=', $status);

    $perpage = Config::meta('posts_per_page');
    $total = $query->count();
    $staffs = $query->sort('grade', 'desc')->take($perpage)->skip(($page - 1) * $perpage)->get();
    $url = Uri::to('admin/staffs/status/' . $status);

    $pagination = new Paginator($staffs, $total, $page, $perpage, $url);

    $vars['messages'] = Notify::read();
    $vars['staffs'] = $pagination;
    $vars['status'] = $status;

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
    $vars['fields'] = Extend::fields('staff', $id);
    $division_roles = array();

    // get current staff division role
    if ($staff_roles = Role::where('staff', '=', $id)->get(array('division'))) {
      foreach ($staff_roles as $div) {
        $division_roles[] = $div->division;

      }
    }
    $vars['division_roles'] = $division_roles;

    $hierarchies = Hierarchy::where('staff', '=', $id)->fetch();

    $vars['staff']->division = $hierarchies->division;
    $vars['staff']->branch = $hierarchies->branch;
    $vars['staff']->sector = $hierarchies->sector;
    $vars['staff']->unit = $hierarchies->unit;

    foreach (array('Scheme', 'Division', 'Branch', 'Sector', 'Unit') as $hierarchy) {
      $vars[strtolower($hierarchy) . 's'] = $hierarchy::dropdown();
      array_unshift($vars[strtolower($hierarchy) . 's'], __('staff.please_select'));
    }

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

		$input = Input::get(array(
      'salutation',
      'first_name',
      'last_name',
      'display_name',
      'gender',
      'email',
      'telephone',
      'status',

      'scheme',
      'grade',
      'job_title',
      'position',
      'description',

      'account'
    ));

    $hierarchy = Input::get(array(
      'division',
      'branch',
      'sector',
      'unit',
    ));

    $account_enable = false;
		$password_reset = false;

    if ($input['account']) {
      $account_enable = true;
    } else {
      unset($input['username']);
      unset($input['password']);
      unset($input['role']);
    }

    if($role = Input::get('role')) {
      $input['role'] = $role;
    }

		if($password = Input::get('password')) {
			$input['password'] = $password;
			$password_reset = true;
		}

		$validator = new Validator($input);

		$validator->add('safe', function($str) use($id) {
			return ($str != 'inactive' and Auth::staff()->id == $id);
		});

    $validator->check('email')
      ->is_email(__('staff.email_missing'));

    $validator->check('telephone')
      ->is_max(4, __('staff.telephone_ missing', 4));

    if($account_enable) {
  		$validator->check('username')
  			->is_max(2, __('staff.username_missing', 2));
    }

		if($password_reset) {
			$validator->check('password')
				->is_max(6, __('staff.password_too_short', 6));
		}

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::warning($errors);

			return Response::redirect('admin/staffs/edit/' . $id);
		}

		if($password_reset) {
			$input['password'] = Hash::make($input['password']);
		}

		Staff::update($id, $input);

    $hierarchy['staff'] = $id;

    // hierarchy
    if ($exist = Hierarchy::where('staff', '=', $id)->fetch()) {
      Hierarchy::update($exist->id, $hierarchy);
    } else {
      Hierarchy::create($hierarchy);
    }

    // division roles
    if($inputroles = Input::get('roles')) {

      $roles = array();
      Role::where('staff', '=', $id)->delete();

      foreach ($inputroles as $div) {
        $roles['staff'] = $id;
        $roles['division'] = $div;
        Role::create($roles);
      }
    }

		Notify::success(__('staff.updated'));

		return Response::redirect('admin/staffs/edit/' . $id);
	});

	/*
		Add staff
	*/
	Route::get('admin/staffs/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

    // extended fields
    $vars['fields'] = Extend::fields('staff');

    foreach (array('Scheme', 'Division', 'Branch', 'Sector', 'Unit') as $hierarchy) {
      $vars[strtolower($hierarchy) . 's'] = $hierarchy::dropdown();
      array_unshift($vars[strtolower($hierarchy) . 's'], __('staff.please_select'));
    }

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

		return View::create('staffs/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/staffs/add', function() {
		$input = Input::get(array('username', 'email', 'real_name', 'password', 'bio', 'status', 'role'));

		$validator = new Validator($input);

		$validator->check('username')
			->is_max(2, __('staff.username_missing', 2));

		$validator->check('email')
			->is_email(__('staff.email_missing'));

		$validator->check('password')
			->is_max(6, __('staff.password_too_short', 6));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::warning($errors);

			return Response::redirect('admin/staffs/add');
		}

		$input['password'] = Hash::make($input['password']);

		Staff::create($input);

		Notify::success(__('staff.created'));

		return Response::redirect('admin/staffs');
	});

	/*
		Delete staff
	*/
	Route::get('admin/staffs/delete/(:num)', function($id) {
		$self = Auth::staff();

		if($self->id == $id) {
			Notify::warning(__('staff.delete_error'));

			return Response::redirect('admin/staffs/edit/' . $id);
		}

		Staff::where('id', '=', $id)->delete();

		Notify::success(__('staff.deleted'));

		return Response::redirect('admin/staffs');
	});

});
