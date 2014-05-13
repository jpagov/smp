<?php

Route::collection(array('before' => 'auth,csrf'), function() {

	/*
		List Sectors
	*/
	Route::get(array('admin/sectors', 'admin/sectors/(:num)'), function($page = 1) {
		$vars['messages'] = Notify::read();
		$vars['sectors'] = Sector::paginate($page, Config::get('meta.staffs_per_page'));
		$vars['hierarchies'] = Config::app('hierarchy');

		return View::create('sectors/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	/*
		Edit Sector
	*/
	Route::get('admin/sectors/edit/(:num)', function($id) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['sector'] = Sector::find($id);

		return View::create('sectors/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/sectors/edit/(:num)', function($id) {
		$input = Input::get(array('title', 'slug', 'description'));

		if(empty($input['slug'])) {
			$input['slug'] = acronym($input['title']);
		}

		$input['slug'] = slug($input['slug']);

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('hierarchy.title_missing'));

		$validator->add('duplicate', function($str) use($id) {
			return Sector::where('slug', '=', $str)->where('id', '<>', $id)->count() == 0;
		});

		$validator->check('slug')
			->is_max(3, __('posts.slug_missing'))
			->is_duplicate(__('posts.slug_duplicate'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::warning($errors);

			return Response::redirect('admin/sectors/edit/' . $id);
		}

		Sector::update($id, $input);

		Notify::success(__('hierarchy.updated'));

		return Response::redirect('admin/sectors/edit/' . $id);
	});

	/*
		Add sector
	*/
	Route::get('admin/sectors/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		return View::create('sectors/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/sectors/add', function() {
		$input = Input::get(array('title', 'slug', 'description'));

		if(empty($input['slug'])) {
			$input['slug'] = acronym($input['title']);
		}

		$input['slug'] = slug($input['slug']);

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('hierarchy.title_missing'));

		$validator->add('duplicate', function($str) {
			return Branch::where('slug', '=', $str)->count() == 0;
		});

		$validator->check('slug')
			->is_max(3, __('posts.slug_missing'))
			->is_duplicate(__('posts.slug_duplicate'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::warning($errors);

			return Response::redirect('admin/sectors/add');
		}

		Sector::create($input);

		Notify::success(__('hierarchy.created'));

		return Response::redirect('admin/sectors');
	});

	/*
		Delete sector
	*/
	Route::get('admin/sectors/delete/(:num)', function($id) {
		Sector::find($id)->delete();

		//TODO: admin only, not for PTB
		Hierarchy::where('sector', '=', $id)->update(array('sector' => 0));

		Notify::success(__('hierarchy.deleted'));

		return Response::redirect('admin/sectors');
	});

});
