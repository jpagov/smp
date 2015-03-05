<?php

Route::collection(array('before' => 'auth,csrf,admin'), function() {

	/*
		List tags
	*/
	Route::get(array('admin/tags', 'admin/tags/(:num)'), function($page = 1) {

		$vars['messages'] = Notify::read();
		$vars['tags'] = Tag::paginate($page, Config::get('meta.staffs_per_page'));

		return View::create('tags/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');

	});

	/*
		Edit Tag
	*/
	Route::get('admin/tags/edit/(:num)', function($id) {

		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['tag'] = Tag::find($id);

		return View::create('tags/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');

	});

	Route::post('admin/tags/edit/(:num)', function($id) {

		$input = Input::get([
			'title',
			'slug',
		]);

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('tags.title_missing'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::danger($errors);

			return Response::redirect('admin/tags/edit/' . $id);
		}

		if(empty($input['slug'])) {
			$input['slug'] = $input['title'];
		}

		$input['slug'] = slug($input['slug']);

		Tag::update($id, $input);

		Notify::success(__('tags.updated'));

		return Response::redirect('admin/tags/edit/' . $id);
	});

	/*
		Add Tag
	*/
	Route::get('admin/tags/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();

		return View::create('tags/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/tags/add', function() {

		$input = Input::get([
			'title',
			'slug',
		]);

		$validator = new Validator($input);

		$validator->check('title')
			->is_max(3, __('tags.title_missing'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::danger($errors);

			return Response::redirect('admin/tags/add');
		}

		if(empty($input['slug'])) {
			$input['slug'] = $input['title'];
		}

		$input['slug'] = slug($input['slug']);
		$input['created'] = Date::mysql('now');

		Tag::create($input);

		Notify::success(__('tags.created'));

		return Response::redirect('admin/tags');
	});

	/*
		Delete Tag
	*/
	Route::get('admin/tags/delete/(:num)', function($id) {
		$total = Tag::count();

		if($total == 1) {
			Notify::danger(__('tags.delete_error'));

			return Response::redirect('admin/tags/edit/' . $id);
		}

		// delete selected
		Tag::find($id)->delete();

		// delete staffs relation
		StaffTag::find($id)->delete();

		Notify::success(__('tags.deleted'));

		return Response::redirect('admin/tags');
	});

});
