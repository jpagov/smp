<?php

Route::collection(array('before' => 'auth,csrf'), function() {

	/*
		List Sectors
	*/
	Route::get(array('admin/sectors', 'admin/sectors/(:num)'), function($page = 1) {
		$vars['messages'] = Notify::read();
		$search = false;
		$editor = Auth::user();

		$input = filter_var_array(Input::get(array('division', 'term')), array(
		    'division' => FILTER_SANITIZE_SPECIAL_CHARS,
		    'term' => FILTER_SANITIZE_SPECIAL_CHARS,
		));

		if (empty($input['division'])) {
			$input['division'] = Division::find($editor->roles[0])->slug;
		}

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
			$sectors = Sector::search($input['term'], $page, Config::meta('staffs_per_page'));
		} else {
			$sectors = (isset($input['division']) && $editor->role != 'administrator')  ?
				Sector::division($input['division'], $page, Config::get('meta.staffs_per_page')) :
				Sector::paginate($page, Config::meta('staffs_per_page'));
		}

		$vars['sectors'] = $sectors;
		$vars['hierarchies'] = Config::app('hierarchy');

		return View::create('sectors/index', $vars)
			->partial('header', 'partials/header')
			->partial('search', 'partials/search', $vars)
			->partial('footer', 'partials/footer');
	});

	/*
		Edit Sector
	*/
	Route::get('admin/sectors/edit/(:num)', function($id) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['sector'] = Sector::find($id);

		$vars['staffs'] = Staff::search(null, 1, Config::meta('staffs_per_page'), true, [
			'sector' => $vars['sector']->id
		]);

		return View::create('sectors/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/sectors/edit/(:num)', function($id) {
		$input = Input::get(array('title', 'slug', 'description', 'sort'));

		if(empty($input['slug'])) {
			$input['slug'] = slug($input['title']);
		}

		if(empty($input['sort'])) {
			$input['sort'] = null;
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
		$sector = Sector::find($id);

		Notify::success(__('hierarchy.updated', $sector->title));

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
		$input = Input::get(array('title', 'slug', 'description', 'sort'));

		if(empty($input['slug'])) {
			$input['slug'] = slug($input['title']);
		}

		if(empty($input['sort'])) {
			unset($input['sort']);
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

		$sector = Sector::find($id);
		$title = $sector->title;
		$sector->delete();

		//TODO: admin only, not for PTB
		Hierarchy::where('sector', '=', $id)->update(array('sector' => 0));

		Notify::success(__('hierarchy.deleted', $title));

		return Response::redirect('admin/sectors');
	});

});
