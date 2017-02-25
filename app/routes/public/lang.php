<?php
Route::get(['lang/(:any)', 'lang/(:any)/(:all)'], function($lang = 'ms_MY', $url = '/') {

	$languages = Language::all(true);

	if (in_array($url, $languages)) {
		$lang = $url;
		$url = full_url();
	} else {
		$url = full_url($url);
	}

	$url = empty($_SERVER['QUERY_STRING']) ? $url :  $url . '?' . $_SERVER['QUERY_STRING'];

	$url = filter_var($url, FILTER_SANITIZE_URL);
	$lang = filter_var($lang, FILTER_SANITIZE_SPECIAL_CHARS);

	if (! in_array($lang, $languages)) {
		$lang = Config::app('language', 'ms_MY');
	}
	//dd(full_url(), Uri::current(), $url, $lang, $_SERVER['QUERY_STRING']);
	Cookie::write(Config::app('prefix') . '_lang', $lang, Config::session('lifetime'));

	return Response::redirect($url);

});

Route::post('lang', function() {

	$inputs = filter_input_array(INPUT_POST, [
		'lang' => FILTER_SANITIZE_SPECIAL_CHARS,
		'url' => FILTER_SANITIZE_ENCODED,
	]);

	$languages = Language::all(true);

	if (! in_array($inputs['lang'], $languages)) {
		$inputs['lang'] = Config::app('language', 'ms_MY');
	}

	Cookie::write(Config::app('prefix') . '_lang', $inputs['lang'], Config::session('lifetime'));

	return Response::redirect(urldecode($inputs['url']));
});
