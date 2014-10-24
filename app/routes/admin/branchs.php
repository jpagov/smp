<?php

Route::collection(array('before' => 'auth,csrf'), function() {

	/*
	Branchs Admin JSON API
	*/
	Route::get(array('admin/branchs/json', 'admin/branchs/(:num)/json'), function($division = null) {

	$lists = array();

	if ($branchs = Hierarchy::branch($division)) {
	  foreach ($branchs as $branch) {
	    $lists[] = $branch->title;
	  }
	}

	$json = Json::encode(array(
	  'branchs' => $lists
	));

	return Response::create($json, 200, array('content-type' => 'application/json'));
	});

	/*
		List Branchs
	*/
	Route::get(array('admin/branchs', 'admin/branchs/(:num)'), function($page = 1) {

		$input = filter_var_array(Input::get(array('division')), array(
		    'division' => FILTER_SANITIZE_SPECIAL_CHARS
		));

		$input = array_filter($input);

		$vars['messages'] = Notify::read();

		$vars['branchs'] = (array_filter($input)) ?
			Branch::division($input['division'], $page, Config::get('meta.staffs_per_page')) :
			Branch::paginate($page, Config::get('meta.staffs_per_page'));


		$vars['hierarchies'] = Config::app('hierarchy');
		$vars['divisions'] = Division::listing();
		$vars['status'] = 'all';

		if ($input) {
			$vars['division'] = $input['division'];
			Session::put('redirect', Uri::current());
		}

		return View::create('branchs/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	/*
		Edit Branch
	*/
	Route::get('admin/branchs/edit/(:num)', function($id) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['branch'] = Branch::find($id);

		return View::create('branchs/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/branchs/edit/(:num)', function($id) {
		$input = Input::get(array('title', 'slug', 'description'));

		if(empty($input['slug'])) {
			$input['slug'] = slug($input['title']);
		}

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('hierarchy.title_missing'));

		$validator->add('duplicate', function($str) use($id) {
			return Branch::where('slug', '=', $str)->where('id', '<>', $id)->count() == 0;
		});

		$validator->check('slug')
			->is_max(3, __('posts.slug_missing'))
			->is_duplicate(__('posts.slug_duplicate'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::warning($errors);

			return Response::redirect('admin/branchs/edit/' . $id);
		}

		Branch::update($id, $input);

		Notify::success(__('hierarchy.updated'));

		return Response::redirect('admin/branchs/edit/' . $id);
	});

	/*
		Add branch
	*/
	Route::get('admin/branchs/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		return View::create('branchs/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/branchs/add', function() {
		$input = Input::get(array('title', 'slug', 'description'));

		if(empty($input['slug'])) {
			$input['slug'] = slug($input['title']);
		}

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('branch.title_missing'));

		$validator->add('duplicate', function($str) {
			return Branch::where('slug', '=', $str)->count() == 0;
		});

		$validator->check('slug')
			->is_max(3, __('posts.slug_missing'))
			->is_duplicate(__('posts.slug_duplicate'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::warning($errors);

			return Response::redirect('admin/branchs/add');
		}

		Branch::create($input);

		Notify::success(__('branch.created'));

		return Response::redirect('admin/branchs');
	});

	/*
		Delete branch
	*/
	Route::get('admin/branchs/delete/(:num)', function($id) {
		Branch::find($id)->delete();

		//TODO: admin only, not for PTB
		Hierarchy::where('branch', '=', $id)->update(array('branch' => 0));

		Notify::success(__('hierarchy.deleted', 'branch'));

		if ($redirect = Session::get('redirect')) {
	        Session::erase('redirect');
	        return Response::redirect($redirect);
	    }

		return Response::redirect('admin/branchs');
	});

});
