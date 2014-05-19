<?php

/**
 * Theme functions for units
 */

function total_units() {
	if( ! $units = Registry::get('units')) {
		$units = Unit::get();

		$units = new Items($units);

		Registry::set('units', $units);
	}

	return $units->length();
}

function all_units() {
    if( ! $units = Registry::get('units')) {
        //$units = Unit::where('show_in_menu', '=', '1')->get();
        $units = Unit::get();
    }

    return $units;
}

function important_units() {
    if( ! $units = Registry::get('units')) {
        $units = Unit::where('show_in_menu', '=', '1')->get();
    }

    return $units;
}

// loop units
function units() {
	if( ! total_units()) return false;

	$items = Registry::get('units');

	if($result = $items->valid()) {
		// register single unit
		Registry::set('unit', $items->current());

		// move to next
		$items->next();
	}

	return $result;
}

// single units
function unit_id() {
	return Registry::prop('unit', 'id');
}

function unit_title() {
	return Registry::prop('unit', 'title');
}

function unit_slug() {
	return Registry::prop('unit', 'slug');
}

function unit_description() {
	return Registry::prop('unit', 'description');
}

function unit_url() {
	return base_url('unit/' . unit_slug());
}

function unit_count() {
  return Registry::prop('unit', 'staff');
}

function unit_countx() {
	return Query::table(Base::table('staffs'))
		->where('unit', '=', unit_id())
		->where('status', '=', 'active')->count();
}
