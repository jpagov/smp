<?php

Route::collection(array('before' => 'auth,csrf,admin,editor'), function() {

	/*
		List Fields
	*/
	Route::get(array('admin/setting/fields', 'admin/setting/fields/(:num)'), function($page = 1) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['extend'] = Extend::paginate($page, Config::get('meta.staffs_per_page'));

		return View::create('setting/fields/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	/*
		Add Field
	*/
	Route::get('admin/setting/fields/add', function() {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['types'] = array(
		  'post' => 'post',
		  'page' => 'page',
		  'staff' => 'staff'
		);
		$vars['fields'] = array(
		  'text' => 'text',
		  'html' => 'html',
		  'image' => 'image',
		  'file' => 'file'
		);

		return View::create('setting/fields/add', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/setting/fields/add', function() {
		$input = Input::get(array('type', 'field', 'key', 'label', 'attributes'));

		if(empty($input['key'])) {
			$input['key'] = $input['label'];
		}

		$input['key'] = slug($input['key'], '_');

		$validator = new Validator($input);

		$validator->add('valid_key', function($str) use($input) {
			return Extend::where('key', '=', $str)
				->where('type', '=', $input['type'])->count() == 0;
		});

		$validator->check('key')
			->is_max(1, __('extend.key_missing'))
			->is_valid_key(__('extend.key_exists'));

		$validator->check('label')
			->is_max(1, __('extend.label_missing'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::error($errors);

			return Response::redirect('admin/setting/fields/add');
		}

		if($input['field'] == 'image') {
			$attributes = Json::encode($input['attributes']);
		}
		else if($input['field'] == 'file') {
			$attributes = Json::encode(array(
				'attributes' => array(
					'type' => $input['attributes']['type']
				)
			));
		}
		else {
			$attributes = '';
		}

		Extend::create(array(
			'type' => $input['type'],
			'field' => $input['field'],
			'key' => $input['key'],
			'label' => $input['label'],
			'attributes' => $attributes
		));

		Notify::success(__('extend.field_created'));

		return Response::redirect('admin/setting/fields');
	});

	/*
		Edit Field
	*/
	Route::get('admin/setting/fields/edit/(:num)', function($id) {
		$vars['messages'] = Notify::read();
		$vars['token'] = Csrf::token();
		$vars['types'] = array(
		  'post' => 'post',
		  'page' => 'page',
		  'staff' => 'staff'
		);
		$vars['fields'] = array(
		  'text' => 'text',
		  'html' => 'html',
		  'image' => 'image',
		  'file' => 'file'
		);

		$extend = Extend::find($id);

		if($extend->attributes) {
			$extend->attributes = Json::decode($extend->attributes);
		}

		$vars['field'] = $extend;

		return View::create('setting/fields/edit', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::post('admin/setting/fields/edit/(:num)', function($id) {
		$input = Input::get(array('type', 'field', 'key', 'label', 'attributes'));

		if(empty($input['key'])) {
			$input['key'] = $input['label'];
		}

		$input['key'] = slug($input['key'], '_');

		$validator = new Validator($input);

		$validator->add('valid_key', function($str) use($id, $input) {
			return Extend::where('key', '=', $str)
				->where('type', '=', $input['type'])
				->where('id', '<>', $id)->count() == 0;
		});

		$validator->check('key')
			->is_max(1, __('extend.key_missing'))
			->is_valid_key(__('extend.key_exists'));

		$validator->check('label')
			->is_max(1, __('extend.label_missing'));

		if($errors = $validator->errors()) {
			Input::flash();

			Notify::error($errors);

			return Response::redirect('admin/setting/fields/add');
		}

		if($input['field'] == 'image') {
			$attributes = Json::encode($input['attributes']);
		}
		else if($input['field'] == 'file') {
			$attributes = Json::encode(array(
				'attributes' => array(
					'type' => $input['attributes']['type']
				)
			));
		}
		else {
			$attributes = '';
		}

		Extend::update($id, array(
			'type' => $input['type'],
			'field' => $input['field'],
			'key' => $input['key'],
			'label' => $input['label'],
			'attributes' => $attributes
		));

		Notify::success(__('extend.field_updated'));

		return Response::redirect('admin/setting/fields/edit/' . $id);
	});

	/*
		Delete Field
	*/
	Route::get('admin/setting/fields/delete/(:num)', function($id) {
		$field = Extend::find($id);

		Query::table(Base::table($field->type . '_meta'))->where('extend', '=', $field->id)->delete();

		$field->delete();

		Notify::success(__('extend.field_deleted'));

		return Response::redirect('admin/setting/fields');
	});

});
