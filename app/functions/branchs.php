<?php

/**
 * Theme functions for branchs
 */

function total_branchs() {
	if( ! $branchs = Registry::get('branchs')) {
		//$branchs = Branch::get();

		//$branchs = new Items($branchs);

		//Registry::set('branchs', $branchs);
		return false;
	}

	return $branchs->length();
}

// loop branchs
function branchs() {
	if( ! total_branchs()) return false;

	$items = Registry::get('branchs');

	if($result = $items->valid()) {
		// register single branch
		Registry::set('branch', $items->current());

		// move to next
		$items->next();
	}

	return $result;
}

// single branchs
function branch_id() {
	return Registry::prop('branch', 'id');
}

function branch_title() {
	return Registry::prop('branch', 'title');
}

//function branch_title_en() {
//    return Registry::prop('branch', 'title_en');
//}

function branch_slug() {
	return Registry::prop('branch', 'slug') ?: Registry::get('branch_slug');
}

function branch_description() {
	return Registry::prop('branch', 'description');
}
