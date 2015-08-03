<?php

/*
	Custom theme functions

	Note: we recommend you prefix all your functions to avoid any naming
	collisions or wrap your functions with if function_exists braces.
*/
function numeral($number) {
	$test = abs($number) % 10;
	$ext = ((abs($number) % 100 < 21 and abs($number) % 100 > 4) ? 'th' : (($test < 4) ? ($test < 3) ? ($test < 2) ? ($test < 1) ? 'th' : 'st' : 'nd' : 'rd' : 'th'));
	return $number . $ext;
}

function count_words($str) {
	return count(preg_split('/\s+/', strip_tags($str), null, PREG_SPLIT_NO_EMPTY));
}

function pluralise($amount, $str, $alt = '') {
	return intval($amount) === 1 ? $str : $str . ($alt !== '' ? $alt : 's');
}

function relative_time($date) {
	if(is_numeric($date)) $date = '@' . $date;

	$user_timezone = new DateTimeZone(Config::app('timezone'));
	$date = new DateTime($date, $user_timezone);

	// get current date in user timezone
	$now = new DateTime('now', $user_timezone);

	$elapsed = $now->format('U') - $date->format('U');

	if($elapsed <= 1) {
		return 'Just now';
	}

	$times = array(
		31104000 => 'year',
		2592000 => 'month',
		604800 => 'week',
		86400 => 'day',
		3600 => 'hour',
		60 => 'minute',
		1 => 'second'
	);

	foreach($times as $seconds => $title) {
		$rounded = $elapsed / $seconds;

		if($rounded > 1) {
			$rounded = round($rounded);
			return $rounded . ' ' . pluralise($rounded, $title) . ' ago';
		}
	}
}

function show_division_meta() {
	return setting('show_division_meta');
}

function show_direct_report() {
	return setting('show_direct_report');
}

function show_personal_assistant() {
	return setting('show_personal_assistant');
}

function show_rating() {
	return setting('show_rating');
}

function show_message() {
	return setting('show_message');
}

function show_social() {
	return setting('show_social');
}

function twitter_account() {
	return site_meta('twitter', 'hariadi');
}

function twitter_url() {
	return 'https://twitter.com/' . twitter_account();
}

function total_staff() {
	return Staff::where(Base::table('staffs.status'), '=', 'active')->count();
}

function staff_avatar($id, $gender = 'M') {
	$default =  ($gender == 'M') ? 'default-male.jpg' : 'default-female.jpg';

	if($extend = Extend::field('staff', 'avatar', $id)) {
		return Extend::value($extend, $default);
	}
	return $default;
}

function hide_avatar($default = null) {
	if (!Auth::user()) {
		return staff_custom_field('hide_avatar');
	}
}

function revision($filename) {

	$base = PATH . 'themes' . DS . Config::meta('theme') . DS;

	$manifest_path = $base . 'assets/rev-manifest.json';

	if (file_exists($manifest_path)) {
		$manifest = Json::decode(file_get_contents($manifest_path), true);
	} else {
		return $filename;
	}

	if (array_key_exists($filename, $manifest)) {
		return theme_asset($manifest[$filename]);
	}

  	return theme_asset($filename);
}
