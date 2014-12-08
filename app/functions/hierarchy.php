<?php

/**
 * Theme functions for hierarchies
 */

function total_hierarchies($type = 'branch') {
	if( ! $hierarchies = Registry::get($type . 's')) {
		//$hierarchies = Branch::get();

		//$hierarchies = new Items($hierarchies);

		//Registry::set($type, $hierarchies);
		return false;
	}

	return $hierarchies->length();
}

// loop hierarchies
function hierarchies($type = 'branch') {
	if( ! total_hierarchies()) return false;

	$items = Registry::get($type . 's');

	if($result = $items->valid()) {
		// register single branch
		Registry::set($type, $items->current());

		// move to next
		$items->next();
	}

	return $result;
}

// single hierarchies
function hierarchy_id($type = 'branch') {
	return Registry::prop($type, 'id');
}

function hierarchy_title() {
	return Registry::prop($type, 'title');
}

//function hierarchy_title_en() {
//    return Registry::prop($type, 'title_en');
//}

function hierarchy_slug() {
	return Registry::prop($type, 'slug');
}

function hierarchy_description() {
	return Registry::prop($type, 'description');
}

function has_meta() {
	return Registry::prop($type, 'description');
}
