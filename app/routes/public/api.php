<?php

/**
 * Staff API
 */
//Route::get(array('api', 'api/(:any)'), array('before' => 'apiauth', 'main' => function() {


//Route::get('api/(:any)/staff.json', function($divisions_slug = null) {

Route::get(array('api', 'api/(:any)'), function($slug = '') {

	if (!Auth::check()) {
		return Response::create(Json::encode(array('message' => 'Bad credentials')), 401, array(
			'content-type' => 'application/json; charset=utf-8'
		));
	}

	$input = array_filter(filter_var_array(Input::get(
		array(
			'query'
		)),
		array(
			'query' => FILTER_SANITIZE_SPECIAL_CHARS,
		)
	));

	$input['division'] = filter_var($slug, FILTER_SANITIZE_SPECIAL_CHARS);


	$query = isset($input['query']) ? $input['query'] : 0;

	$division = (isset($input['division']) && !empty($input['division'])) ? Division::slug($input['division'])->id : 0;

	$fields = array('id', 'display_name', 'position', 'email', 'telephone', 'slug', 'gender');

	//TODO: make this configurable via admin under setting->user
	$staffs = Staff::where('status', '=', 'active')
		->where('grade', '>=', '22')
		->where('view', '>', '20000')
		->sort(Base::table('staffs.grade'), 'desc');

	if ($query) {
		$staffs->where('display_name', 'like', '%' . $query . '%');
	}

	if ($division) {
		$staffs->where('division', '=', $division);
	}

	if ((int) $staffs->count() === 0) {
		return Response::create(Json::encode(array('message' => 'No data')), 200, array(
			'content-type' => 'application/json; charset=utf-8'
		));
	}

	$staffs = $staffs->get(Staff::fields($fields));

	$api = array();

	foreach ($staffs as $key => $staff) {

		$extends = Extend::fields('staff', $staff->id);

		foreach ($extends as $extend) {
			switch($extend->field) {
				case 'text':
				if( ! empty($extend->value->text)) {
					$staff->twitter = $extend->value->text;
				}
				break;

				case 'image':
				if( ! empty($extend->value->filename)) {
					$staff->avatar = $extend->value->filename;
				}

				if (!$staff->avatar) {
					$staff->avatar = ($staff->gender == 'M') ? 'default-male.jpg' : 'default-female.jpg';
				}
				break;
			}
		}

		// convert to accosiative array
		foreach ($fields as $field) {
			$api[$key][$field] = $staff->$field;
			$api[$key]['tokens'][] = $staff->$field;
			$api[$key]['value'] = $staff->slug;
			$api[$key]['avatar'] = $staff->avatar;
			$api[$key]['twitter'] = $staff->twitter;
			//$api[$key]['token'] = array($staff->display_name, $staff->email);
		}
	}

	//print_r($api); exit();

	$json = Json::encode($api);

	if (isset($input['callback']) && is_valid_callback($input['callback'])) {

		return Response::create($input['callback'] . '(' . $json . ')', 200, array(
			'access-control-allow-origin' => '*',
			'content-type' => 'application/javascript'
		));
	} else {

		return Response::create($json, 200, array(
			'X-Frame-Options' => 'SAMEORIGIN',
			'content-type' => 'application/json; charset=utf-8'
		));
	}


});

/**
 * Staff email API
 */
Route::get(array('api/email/(:any)'), function($id = '') {

	$api = array();

	if (!$staff = Staff::id($id)) {
		return;
	}

	$api['email'] = $staff->email;

	$json = Json::encode($api);

	return Response::create($json, 200, array(
		'X-Frame-Options' => 'SAMEORIGIN',
		'content-type' => 'application/json; charset=utf-8'
		));

});
