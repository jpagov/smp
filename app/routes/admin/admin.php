<?php

/**
 * Admin actions
 */
Route::action('auth', function() {
    Session::put('redirect', Uri::current());
	if(Auth::guest()) return Response::redirect('admin/login');
});

Route::action('guest', function() {
	if(Auth::user()) return Response::redirect('admin/staffs');
});

Route::action('admin', function() {
  if(Auth::user() and Auth::user()->role != 'administrator') return Response::error(401);
});

Route::action('editor', function() {
  if(Auth::user() and Auth::user()->role != 'editor') return Response::error(401);
});

Route::action('csrf', function() {
	if(Request::method() == 'POST') {
		if( ! Csrf::check(Input::get('token'))) {
			Notify::warning(array('Invalid token'));
			Csrf::reset();

			if ($url = Input::get('url')) {
				return Response::redirect(filter_var($url, FILTER_SANITIZE_URL));
			}

			return Response::redirect('admin/login');
		}
	}
});

Route::action('log', function($response) {

	if (!Auth::user()) {
		return;
	}

	$action = array(
		'who' => Auth::user()->id,
		'ip' => get_client_ip(),
		'method' => Request::method(),
		'what' => Uri::current(),
		'when' => Date::mysql('now'),
	);

	Log::create($action);

});

/**
 * Admin routing
 */
Route::get('admin', function() {
	if(Auth::guest()) return Response::redirect('admin/login');
	return Response::redirect('admin/staffs');
});

/*
	Log in
*/
Route::get('admin/login', function() {
	$vars['messages'] = Notify::read();
	$vars['token'] = Csrf::token();

	return View::create('staffs/login', $vars)
		->partial('header', 'partials/header')
		->partial('footer', 'partials/footer');
});

Route::post('admin/login', array('before' => 'csrf', 'main' => function() {

	$attempt = Auth::attempt(Input::get('user'), Input::get('pass'));

	if( ! $attempt) {
		Notify::warning(__('users.login_error'));

		return Response::redirect('admin/login');
	}

	$admin = Auth::user();

	Staff::update($admin->id, array('last_visit' => Date::mysql('now')));

	$redirect = 'admin/staffs';

    if (Session::get('redirect')) {
    	$redirect = Session::get('redirect');
        Session::erase('redirect');
    }

    $division = ($admin->division) ? $admin->division : (array_filter($admin->roles)) ?: '';

   	if ($div = Division::find($division)) {
   		$division = $div->slug;
   	}

   	Session::put('division', $division);

   	if ($admin->role == 'staff') {
   		return Response::redirect('admin/staffs/edit/' . $admin->id);
   	}

	// check for updates
	//Update::version();
  	Division::counter();

	if(version_compare(Config::get('meta.update_version'), VERSION, '>')) {
		return Response::redirect('admin/upgrade');
	}

	return Response::redirect(($division) ? 'admin/staffs?division[]=' . $division : $redirect);
}));

/*
	Log out
*/
Route::get('admin/logout', function() {
	Auth::logout();
	Session::erase('division');
	Notify::warning(__('users.logout_notice'));
	return Response::redirect('admin/login');
});

/*
	Amnesia
*/
Route::get('admin/amnesia', array('before' => 'guest', 'main' => function() {
	$vars['messages'] = Notify::read();
	$vars['token'] = Csrf::token();

	return View::create('staffs/amnesia', $vars)
		->partial('header', 'partials/header')
		->partial('footer', 'partials/footer');
}));

Route::post('admin/amnesia', array('before' => 'csrf', 'main' => function() {
	$email = Input::get('email');

	$validator = new Validator(array('email' => $email));
	$query = Staff::where('email', '=', $email);

	$validator->add('valid', function($email) use($query) {
		return $query->count();
	});

	$validator->check('email')
		->is_email(__('users.email_missing'))
		->is_valid(__('users.email_not_found'));

	if($errors = $validator->errors()) {
		Input::flash();

		Notify::warning($errors);

		return Response::redirect('admin/amnesia');
	}

	$user = $query->fetch();
	Session::put('user', $user->id);

	$token = noise(8);
	Session::put('token', $token);
	$username = preg_replace( "/^([^@]+)(@.*)$/", "$1", $user->email ?: $email);

	// Enable user access
	Staff::update($user->id, array(
		'username' => $username,
		'account' => $user->account ?: 1,
		'role' => $user->role ?: 'staff'
	));

	$uri = Uri::full('admin/reset/' . $token);

	$emailer = [
		'to' => $user->email,
		'subject' => __('users.recovery_subject'),
		'message' => Braces::compile(PATH . 'content/amnesia.html', [
			'title' => __('users.recovery_subject'),
			'hi' => __('email.hi'),
			'message' => __('users.recovery_message', $uri),
			'thanks' => __('email.thanks'),
			'footer' => __('site.title'),
		])
	];

	$mail = new Email($emailer);

	if(!$mail->send()) {
		Notify::warning(__('users.msg_not_send', $mail->ErrorInfo));
		return Response::redirect('admin/login');
	}

	Notify::success(__('users.recovery_sent'));

	return Response::redirect('admin/login');
}));

/*
	Reset password
*/
Route::get('admin/reset/(:any)', array('before' => 'guest', 'main' => function($key) {
	$vars['messages'] = Notify::read();
	$vars['token'] = Csrf::token();
	$vars['key'] = ($token = Session::get('token'));

	if($token != $key) {
		Notify::warning(__('users.recovery_expired'));

		return Response::redirect('admin/login');
	}

	return View::create('staffs/reset', $vars)
		->partial('header', 'partials/header')
		->partial('footer', 'partials/footer');
}));

Route::post('admin/reset/(:any)', array('before' => 'csrf', 'main' => function($key) {
	$password = Input::get('pass');
	$token = Session::get('token');
	$user = Session::get('user');

	if (!$staff = Staff::find($user)) {
		Notify::warning(__('users.confirm_not_found'));
		return Response::redirect('admin/login');
	}

	if($token != $key) {
		Notify::warning(__('users.recovery_expired'));

		return Response::redirect('admin/login');
	}

	$validator = new Validator(array('password' => $password));

	$validator->check('password')
		->is_max(6, __('users.password_too_short', 6));

	if($errors = $validator->errors()) {
		Input::flash();

		Notify::warning($errors);

		return Response::redirect('admin/reset/' . $key);
	}

	Staff::update($staff->id, [
		'password' => Hash::make($password)
	]);

	$username = preg_replace( "/^([^@]+)(@.*)$/", "$1", $staff->email);

	Session::erase('user');
	Session::erase('token');

	Notify::success(__('users.password_reset', $username));

	// Automatically sign in
	$attempt = Auth::attempt($username, $password);

	if( ! $attempt) {
		Notify::warning(__('users.login_error'));

		return Response::redirect('admin/login');
	}

	$admin = Auth::user();

	Staff::update($admin->id, array('last_visit' => Date::mysql('now')));

	$redirect = 'admin/staffs';

    if (Session::get('redirect')) {
    	$redirect = Session::get('redirect');
        Session::erase('redirect');
    }

    $division = ($admin->division) ? $admin->division : (array_filter($admin->roles)) ?: '';

   	if ($div = Division::find($division)) {
   		$division = $div->slug;
   	}

   	Session::put('division', $division);

   	if ($admin->role == 'staff') {
   		return Response::redirect('admin/staffs/edit/' . $admin->id);
   	}

	// check for updates
	//Update::version();
  	Division::counter();

	return Response::redirect(($division) ? 'admin/staffs?division[]=' . $division : $redirect);
}));

/*
	Profile confirmation
*/
//Route::get('admin/confirm/(:any)', array('before' => 'guest', 'main' => function($key) {
Route::get('admin/confirm/(:any)', array('main' => function($key) {

	$vars['messages'] = Notify::read();
	$key = filter_var($key, FILTER_SANITIZE_SPECIAL_CHARS);

	if (!$confirm = Confirm::where('token', '=', $key)->fetch()) {
		Notify::warning(__('users.confirm_not_found'));
		return Response::redirect('admin/login');
	}

	if ($confirm->confirm_date) {

		$staff = Staff::find($confirm->staff_id);
		$username = preg_replace( "/^([^@]+)(@.*)$/", "$1", $staff->email);

		Notify::warning(__('users.already_confirm', $username));

	} else {

		Confirm::update($confirm->id, [
			'confirm_date' => Date::mysql('now')
		]);

		Notify::success(__('users.confirm'));
	}

	return Response::redirect('admin/login');
}));

/*
	Resend email confirmation
*/
Route::get('admin/confirm/resend/(:num)', array('before' => 'admin', 'main' => function($id) {

	$id = filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS);

	if (!$confirm = Confirm::find($id)) {

		Notify::warning(__('users.confirm_not_found'));
		return Response::redirect('admin/login');

	}

	if (!$staff = Staff::find($confirm->staff_id)) {

		Notify::warning(__('users.confirm_not_found'));
		return Response::redirect('admin/login');

	}

	$token = $confirm->token;
	$profileuri = \Uri::full($staff->slug);
	$confirmuri = \Uri::full('admin/confirm/' . $token);
	$username = preg_replace( "/^([^@]+)(@.*)$/", "$1", $staff->email);
	$amnesiauri = \Uri::full('admin/amnesia');

	$emailer = [
		'to' => $staff->email,
		'subject' => __('email.confirm_subject'),
		'message' => Braces::compile(PATH . 'content/confirm.html', [
			'title' => __('email.confirm_subject'),
			'hi' => __('email.hi'),
			'message_valid' => __('email.confirm_message_valid', $profileuri),
			'message_confirm' => __('email.confirm_message_confirm', $confirmuri),
			'message_access' => __('email.confirm_message_access', $username, $amnesiauri),
			'support' => __('email.confirm_support'),
			'thanks' => __('email.thanks'),
			'footer' => __('site.title'),
		])
	];

	$mail = new Email($emailer);

	if(!$mail->send()) {

		Notify::warning(__('users.msg_not_send', $mail->ErrorInfo));

	} else {

		Notify::success(__('users.confirm_sent'));

	}

	return Response::redirect('admin/login');
}));


/*
	Upgrade
*/
Route::get('admin/upgrade', function() {
	$vars['messages'] = Notify::read();
	$vars['token'] = Csrf::token();

	$version = Config::meta('update_version');
	$url = 'https://github.com/appcms/app-cms/archive/%s.zip';

	$vars['version'] = $version;
	$vars['url'] = sprintf($url, $version);

	return View::create('upgrade', $vars)
		->partial('header', 'partials/header')
		->partial('footer', 'partials/footer');
});

/*
	List setting
*/
Route::get('admin/setting', array('before' => 'auth', 'main' => function($page = 1) {
	$vars['messages'] = Notify::read();
	$vars['token'] = Csrf::token();

	return View::create('setting/index', $vars)
		->partial('header', 'partials/header')
		->partial('footer', 'partials/footer');
}));

/*
  Redirect tp users page
*/
Route::get('admin/setting/users', function() {
  return Response::redirect('admin/users');
});

/*
  Redirect tp users page
*/
Route::get('admin/setting/pages', function() {
  return Response::redirect('admin/pages');
});

/*
	404 error
*/
Route::error('404', function() {
	return Response::error(404);
});

Route::error('401', function() {
  return Response::error(401);
});
