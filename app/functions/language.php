<?php

/*
	Language functions for menus
*/
function total_languages() {
	if( ! $languages = Registry::get('languages')) {
		$languages = new Items(Language::all(true, true));

		Registry::set('languages', $languages);
	}

	return $languages->length();
}

// loop languages
function languages() {
	if( ! total_languages()) return false;

	$items = Registry::get('languages');

	if($result = $items->valid()) {
		// register single language
		Registry::set('language', $items->current());

		// move to next
		$items->next();
	}
	return $result;
}

function language_name() {
	return Registry::get('language')['name'];
}

function language_id() {
	return Registry::get('language')['id'];
}

function language_author() {
	return Registry::get('language')['author'];
}

function language_site() {
	return Registry::get('language')['site'];
}

function language_lisence() {
	return Registry::get('language')['license'];
}

function language_url() {
	return '?lang=' . language_id();
}

function language_current_id() {
	return Language::detect();
}

function language_flag($lang = 'en_GB') {
	return Uri::to('app/views/assets/img/' . strtolower($lang) . '.png');
}
