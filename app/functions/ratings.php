<?php

/**
*	Theme functions for ratings
*/

function has_ratings() {
	if( ! $itm = Registry::get('staff')) {
		return false;
	}

	if( ! $ratings = Registry::get('ratings')) {
		$ratings = Rating::where('staff', '=', $itm->id)->get();
		$ratings = new Items($ratings);

		Registry::set('ratings', $ratings);
	}

	return $ratings->length();
}

function total_ratings() {
	if( ! has_ratings()) return 0;

	$ratings = Registry::get('ratings');

	return $ratings->length();
}

// loop ratings
function ratings() {
	if( ! has_ratings()) return false;

	$ratings = Registry::get('ratings');

	if($result = $ratings->valid()) {
		// register single rating
		Registry::set('rating', $ratings->current());

		// move to next
		$ratings->next();
	}

	return $result;
}

// single ratings

// group by rating score
// return sum
function rating_count($score) {

	if( ! has_ratings()) return 0;

	$ratings = Registry::get('ratings')->raw();

	$results = array();

	foreach ($ratings as $key => $entry) {
		$results[$entry->score][$key] = $entry;
	}

	return (isset($results[$score]) ) ? count($results[$score]) : 0;
}

function rating_percent($score) {

	if( ! has_ratings()) return 0;

	$ratings = Registry::get('ratings')->raw();

	$results = array();

	foreach ($ratings as $key => $entry) {
		$results[$entry->score][$key] = $entry;
	}

	return (isset($results[$score]) ) ? round(((count($results[$score]) / total_ratings())*100)*2) / 2 : 0;
}

function rating_average() {

	if( ! has_ratings()) return 0;

	$ratings = Registry::get('ratings')->raw();

	$total = array_sum(array_map(function($rating) {
				return $rating->score;
			}, $ratings));

	return (round(($total / total_ratings()) * 2) / 2) ?: 0;
}

function rating_id() {
	return Registry::prop('rating', 'id');
}

function rating_time() {
	if($time = Registry::prop('rating', 'created')) {
		return Date::format($time,'U');
	}
}

function rating_date() {
	if($date = Registry::prop('rating', 'created')) {
		return Date::format($date);
	}
}

function rating_score() {
	return Registry::prop('rating', 'score');
}

function rating_score_one() {
	return Registry::prop('rating', 'id');
}

function ratings_open() {
	return Registry::prop('staff', 'rating') ? true : false;
}

// form elements
function rating_form_notifications() {
	return Notify::read();
}

function rating_form_url() {
	return Uri::to(Uri::current());
}

function rating_form_input_name($extra = '') {
	return '<input name="name" id="name" type="text" ' . $extra . ' value="' . Input::previous('name') . '">';
}

function rating_form_input_email($extra = '') {
	return '<input name="email" id="email" type="email" ' . $extra . ' value="' . Input::previous('email') . '">';
}

function rating_form_input_text($extra = '') {
	return '<textarea name="text" id="text" ' . $extra . '>' . Input::previous('text') . '</textarea>';
}

function rating_form_button($text = 'Post Comment', $extra = '') {
	return '<button class="btn" type="submit" ' . $extra . '>' . $text . '</button>';
}
