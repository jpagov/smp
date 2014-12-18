<?php

Route::collection(array('before' => 'auth,csrf'), function() {

	/*
		List Units
	*/
	Route::get(array('admin/units', 'admin/units/(:num)'), function($page = 1) {
		$vars['messages'] = Notify::read();
		$search = false;

		$input = filter_var_array(Input::get(array('term')), array(
		    'term' => FILTER_SANITIZE_SPECIAL_CHARS,
		));

		$input = array_filter($input);

		if (empty($input['term'])) {
			$input['term'] = null;
		}

		if ($input['term']) {
			$validator = new Validator($input);

			$validator->check('term')->is_max(2, __('site.search_missing', 2));

			if($errors = $validator->errors()) {
				Input::flash();
				Notify::warning($errors);
				return Response::redirect(Uri::current());
			}

			Registry::set('admin_search_term', $input['term']);
			$search = true;
		}

		if ($search) {
			$units = Unit::search($input['term'], $page, Config::meta('staffs_per_page'));
		} else {
			$units = Unit::paginate($page, Config::meta('staffs_per_page'));

		}

		$vars['units'] = $units;
		$vars['hierarchies'] = Config::app('hierarchy');

		return View::create('units/index', $vars)
			->partial('header', 'partials/header')
			->partial('search', 'partials/search', $vars)
			->partial('footer', 'partials/footer');
	});

	/*
		Edit Unit
	*/
	Route::get('admin/units/edit/(:num)', function($id) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['unit'] = Unit::find($id);

		return View::create('units/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/units/edit/(:num)', function($id) {
		$input = Input::get(array('title', 'slug', 'description'));

		if(empty($input['slug'])) {
			$input['slug'] = slug($input['title']);
		}

		$input['slug'] = slug($input['slug']);

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('hierarchy.title_missing'));

		$validator->add('duplicate', function($str) use($id) {
			return Unit::where('slug', '=', $str)->where('id', '<>', $id)->count() == 0;
		});

		$validator->check('slug')
			->is_max(3, __('posts.slug_missing'))
			->is_duplicate(__('posts.slug_duplicate'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::warning($errors);

			return Response::redirect('admin/units/edit/' . $id);
		}

		Unit::update($id, $input);

		Notify::success(__('hierarchy.updated'));

		return Response::redirect('admin/units/edit/' . $id);
	});

	/*
		Add unit
	*/
	Route::get('admin/units/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		return View::create('units/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/units/add', function() {
		$input = Input::get(array('title', 'slug', 'description'));

		if(empty($input['slug'])) {
			$input['slug'] = slug($input['title']);
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

			return Response::redirect('admin/units/add');
		}

		Unit::create($input);

		Notify::success(__('hierarchy.created'));

		return Response::redirect('admin/units');
	});

	/*
		Delete unit
	*/
	Route::get('admin/units/delete/(:num)', function($id) {
		Unit::find($id)->delete();

		//TODO: admin only, not for PTB
		Hierarchy::where('unit', '=', $id)->update(array('unit' => 0));

		Notify::success(__('hierarchy.deleted'));

		return Response::redirect('admin/units');
	});

});
