<?php

Route::collection(array('before' => 'auth,csrf'), function() {

	/*
		List Branchs
	*/
	Route::get(array('admin/branchs', 'admin/branchs/(:num)'), function($page = 1) {
		$vars['messages'] = Notify::read();
		$vars['branchs'] = Branch::paginate($page, Config::get('meta.posts_per_page'));
		$vars['hierarchies'] = Config::app('hierarchy');		

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
			$input['slug'] = acronym($input['title']);
		}

		$input['slug'] = slug($input['slug']);

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
			$input['slug'] = acronym($input['title']);
		}

		$input['slug'] = slug($input['slug']);

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

		Notify::success(__('hierarchy.deleted'));

		return Response::redirect('admin/branchs');
	});

});