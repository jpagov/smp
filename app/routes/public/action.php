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
