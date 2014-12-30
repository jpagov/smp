<?php

Route::action('apiauth', function() {
	if(Request::method() == 'GET') {
		$auth = false;

		$input = array_filter(filter_var_array(Input::get(

			array(
				'callback',
				'code',
			)),

			array(
				'callback' => FILTER_SANITIZE_SPECIAL_CHARS,
				'code' => FILTER_SANITIZE_SPECIAL_CHARS,
			)
		));

		if (!isset($input['code'])) {
			return Response::create(Json::encode(array('message' => 'Bad credentials')), 401, array(
				'content-type' => 'application/json; charset=utf-8'
			));
		}

		if ($input['code'] == '6f05ad622a3d32a5a81aee5d73a5826adb8cbf63' && (get_client_ip() == '::1' ||
			get_client_ip() == '127.0.0.1' ||
			get_client_ip() == '10.21.15.76' ||
			get_client_ip() == '10.21.0.76'
			) ) {
			$auth = true;
		}

		if( ! $auth ) {
			return Response::create(Json::encode(array('message' => 'Bad credentials')), 401, array(
				'content-type' => 'application/json; charset=utf-8'
			));
		}
	}
});

/**
 * Staff API
 */
Route::get(array('api', 'api/(:any)'), array('before' => 'apiauth', 'main' => function() {

	// get division id
	$division = !empty($slug) ? Division::slug($slug)->id : '';

	$fields = array('id', 'display_name', 'position', 'email', 'telephone', 'slug', 'gender');

	//TODO: make this configurable via admin under setting->user
	$staffs = Staff::where('status', '=', 'active')
	->where('grade', '>=', '22')
	->where('view', '>', '999')
	->sort(Base::table('staffs.grade'), 'desc');

	if ( !empty($slug) and $division = Division::slug($slug)->id) {
		$staffs = $staffs->where('division', '=', $division);
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
			'access-control-allow-origin' => '*',
			'content-type' => 'application/json; charset=utf-8'
		));
	}


}));

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
