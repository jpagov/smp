<?php

Route::collection(array('before' => 'auth,csrf,admin'), function() {

	/*
		List Categories
	*/
	Route::get(array('admin/categories', 'admin/categories/(:num)'), function($page = 1) {
		$vars['messages'] = Notify::read();
		$vars['categories'] = Category::paginate($page, Config::get('meta.staffs_per_page'));
        $vars['hierarchies'] = Config::app('hierarchy');
        $vars['divisions'] = Division::listing();

		return View::create('categories/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	/*
		Edit Category
	*/
	Route::get('admin/categories/edit/(:num)', function($id) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['category'] = Category::find($id);

		return View::create('categories/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/categories/edit/(:num)', function($id) {

		$input = Input::get(array('title', 'slug', 'description', 'redirect', 'division', 'branch', 'sector', 'unit'));

		//$hierarchies = array('division', 'branch', 'sector', 'unit');

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('categories.title_missing'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::danger($errors);

			return Response::redirect('admin/categories/edit/' . $id);
		}

		$hierarchies = array();

		$hierarchies['division'] = !empty($input['division']) ? $input['division'] : 0;

		foreach (array('branch', 'sector', 'unit') as $hierarchy) {

			$hierarchies[$hierarchy] = !empty($input[$hierarchy]) ? $hierarchy::id($input[$hierarchy]) : 0;
			unset($input[$hierarchy]);
		}
		unset($input['division']);

		if (!$hierarchy = Hierarchy::search($hierarchies)) {
			$hierarchy = Hierarchy::create($hierarchies);
		}

		$input['hierarchy'] = $hierarchy->id;

		if(empty($input['slug'])) {
			$input['slug'] = $input['title'];
		}

		$input['slug'] = slug($input['slug']);

		Category::update($id, $input);

		Notify::success(__('categories.updated'));

		return Response::redirect('admin/categories/edit/' . $id);
	});

	/*
		Add Category
	*/
	Route::get('admin/categories/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		$vars['divisions'] = array_unshift_assoc(Division::dropdown(), '0', __('staffs.please_select'));

		return View::create('categories/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/categories/add', function() {

		$input = Input::get(array('title', 'slug', 'description', 'redirect', 'division', 'branch', 'sector', 'unit'));

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('categories.title_missing'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::danger($errors);

			return Response::redirect('admin/categories/add');
		}

		$hierarchies = array();

		$hierarchies['division'] = !empty($input['division']) ? $input['division'] : 0;

		foreach (array('branch', 'sector', 'unit') as $hierarchy) {

			$hierarchies[$hierarchy] = !empty($input[$hierarchy]) ? $hierarchy::id($input[$hierarchy]) : 0;
			unset($input[$hierarchy]);
		}
		unset($input['division']);

		if (!$hierarchy = Hierarchy::search($hierarchies)) {
			$hierarchy = Hierarchy::create($hierarchies);
		}

		$input['hierarchy'] = $hierarchy->id;

		if(empty($input['slug'])) {
			$input['slug'] = $input['title'];
		}

		$input['slug'] = slug($input['slug']);

		Category::create($input);

		Notify::success(__('categories.created'));

		return Response::redirect('admin/categories');
	});

	/*
		Delete Category
	*/
	Route::get('admin/categories/delete/(:num)', function($id) {
		$total = Category::count();

		if($total == 1) {
			Notify::danger(__('categories.delete_error'));

			return Response::redirect('admin/categories/edit/' . $id);
		}

		// move staffs
		$category = Category::where('id', '<>', $id)->fetch();

		// delete selected
		Category::find($id)->delete();

		// update staffs
		Post::where('category', '=', $id)->update(array(
			'category' => $category->id
		));

		Notify::success(__('categories.deleted'));

		return Response::redirect('admin/categories');
	});

});
