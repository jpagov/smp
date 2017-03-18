<?php
/**
* POST
*/
Route::action('csrf', function() {
	if(Request::method() == 'POST') {
		if( ! Csrf::check(Input::get('token'))) {
			Notify::warning(array('Invalid token'));

			if ($url = Input::get('url')) {
				return Response::redirect(filter_var($url, FILTER_SANITIZE_URL));
			}

			return Response::create(new Template('404'), 404);
		}
	}
});

Route::action('pretend', function() {
	parse_str(Request::segments(), $q);

	if (array_key_exists('pretend', $q)) {
		$pretend = filter_var($q['pretend'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

		if ($pretend) {
			Session::put('pretend', $pretend);

			Input::flash();
			Notify::success(__('global.pretended'));

			return Response::redirect('/');
		} else {
			Session::erase('pretend');

			Input::flash();
			Notify::success(__('global.pretend_canceled'));

			return Response::redirect('admin');
		}
	}
});
