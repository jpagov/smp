<?php

Route::collection(array('before' => 'auth,csrf,admin'), function() {

	/*
		List Divisions
	*/
	Route::get(array('admin/divisions', 'admin/divisions/(:num)'), function($page = 1) {

		$vars['messages'] = Notify::read();
		$search = false;

		$input = Input::get(array(
			'term'
		));

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
			$divisions = Division::search($input['term'], $page, Config::meta('staffs_per_page'));
		} else {
			$divisions = Division::paginate($page, Config::meta('staffs_per_page'));
		}


		$vars['divisions'] = $divisions;

		$vars['hierarchies'] = Config::app('hierarchy');

		return View::create('divisions/index', $vars)
			->partial('header', 'partials/header')
			->partial('search', 'partials/search', $vars)
			->partial('footer', 'partials/footer');
	});

	/*
		Edit Division
	*/
	Route::get('admin/divisions/edit/(:num)', function($id) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['division'] = Division::find($id);

		$vars['parents'] = array_unshift_assoc(Division::dropdown(), '0', __('staffs.please_select'));
		$vars['branchs'] = Hierarchy::branch($id);
		$vars['sectors'] = Hierarchy::sector($id);
		$vars['units'] = Hierarchy::unit($id);

		return View::create('divisions/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/divisions/edit/(:num)', function($id) {
		$input = Input::get(array('title', 'slug', 'description', 'order', 'street', 'city', 'state', 'zip', 'telephone', 'fax', 'parent'));

		if(empty($input['slug'])) {
			$input['slug'] = slug($input['title']);
		}

		$input['slug'] = slug($input['slug']);

		if(empty($input['order'])) {
			$input['order'] = 0;
		}

		if(empty($input['parent'])) {
			$input['parent'] = 0;
		}

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('hierarchy.title_missing'));

		$validator->add('duplicate', function($str) use($id) {
			return Division::where('slug', '=', $str)->where('id', '<>', $id)->count() == 0;
		});

		$validator->check('slug')
			->is_max(2, __('posts.slug_missing'))
			->is_duplicate(__('posts.slug_duplicate'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::warning($errors);

			return Response::redirect('admin/divisions/edit/' . $id);
		}

		Division::update($id, $input);

		Notify::success(__('hierarchy.updated', $input['title']));

		return Response::redirect('admin/divisions/edit/' . $id);
	});

	/*
		Add division
	*/
	Route::get('admin/divisions/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		$vars['parents'] = array_unshift_assoc(Division::dropdown(), '0', __('staffs.please_select'));

		return View::create('divisions/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/divisions/add', function() {
		$input = Input::get(array('title', 'slug', 'description', 'order', 'street', 'city', 'state', 'zip', 'telephone', 'fax', 'parent'));

		if(empty($input['slug'])) {
			$input['slug'] = slug($input['title']);
		}

		$input['slug'] = slug($input['slug']);

		if(empty($input['order'])) {
			$input['order'] = 0;
		}

		if(empty($input['parent'])) {
			$input['parent'] = 0;
		}

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('hierarchy.title_missing'));

    $validator->add('duplicate', function($str) {
      return Division::where('slug', '=', $str)->count() == 0;
    });

		$validator->check('slug')
			->is_max(2, __('posts.slug_missing'))
			->is_duplicate(__('posts.slug_duplicate'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::warning($errors);

			return Response::redirect('admin/divisions/add');
		}

		Division::create($input);

		Notify::success(__('hierarchy.created', 'division'));

		return Response::redirect('admin/divisions');
	});

	/*
		Delete division
	*/
	Route::get('admin/divisions/delete/(:num)', function($id) {
		Division::find($id)->delete();

		//TODO: admin only, not for PTB
		Hierarchy::where('division', '=', $id)->update(array('division' => 0));

		Notify::success(__('hierarchy.deleted'));

		return Response::redirect('admin/divisions');
	});

});
