<?php

Route::collection(array('before' => 'auth,csrf'), function() {

	/*
		List Divisions
	*/
	Route::get(array('admin/divisions', 'admin/divisions/(:num)'), function($page = 1) {
		$vars['messages'] = Notify::read();
		$vars['divisions'] = Division::paginate($page, Config::get('meta.posts_per_page'));
		$vars['hierarchies'] = Config::app('hierarchy');		

		return View::create('divisions/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	/*
		Add division
	*/
	Route::get('admin/divisions/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		/*
		$vars['roles'] = array(
			'administrator' => __('global.administrator'),
			'editor' => __('global.editor'),
			'user' => __('global.user')
		);
		*/

		return View::create('divisions/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/divisions/add', function() {
		$input = Input::get(array('title', 'slug', 'description', 'order'));

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('division.title_missing'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::danger($errors);

			return Response::redirect('admin/divisions/add');
		}

		if(empty($input['slug'])) {
			$input['slug'] = $input['title'];
		}

		$input['slug'] = acronym($input['slug']);

		if(empty($input['order'])) {
			$input['order'] = 0;
		}

		Division::create($input);

		Notify::success(__('division.created'));

		return Response::redirect('admin/divisions');
	});

});