<?php

/**
 * Theme functions for sectors
 */

function total_sectors() {
	if( ! $sectors = Registry::get('sectors')) {
		//$sectors = Sector::get();

		//$sectors = new Items($sectors);

		//Registry::set('sectors', $sectors);
		return false;
	}

	return $sectors->length();
}

// loop sectors
function sectors() {
	if( ! total_sectors()) return false;

	$items = Registry::get('sectors');

	if($result = $items->valid()) {
		// register single sector
		Registry::set('sector', $items->current());

		// move to next
		$items->next();
	}

	return $result;
}

// single sectors
function sector_id() {
	return Registry::prop('sector', 'id');
}

function sector_title() {
	return Registry::prop('sector', 'title');
}

//function sector_title_en() {
//    return Registry::prop('sector', 'title_en');
//}

function sector_slug() {
	return Registry::prop('sector', 'slug');
}

function sector_description() {
	return Registry::prop('sector', 'description');
}

function sector_sort() {
	return Registry::prop('sector', 'sort');
}

function sector_division_slug() {
	return Registry::get('division_slug');
}

function sector_branch_slug() {
	return Registry::get('branch_slug');
}
