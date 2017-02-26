<?php

/**
 * Theme functions for divisions
 */

function total_divisions() {
	if( ! $divisions = Registry::get('divisions')) {
		$divisions = Division::listing();

		$divisions = new Items($divisions);

		Registry::set('divisions', $divisions);
	}

	return $divisions->length();
}

function all_divisions() {
    if( ! $divisions = Registry::get('all_divisions')) {
        $divisions = Division::listing();
    }

    return $divisions;
}

// loop divisions
function divisions() {
	if( ! total_divisions()) return false;

	$items = Registry::get('divisions');

	if($result = $items->valid()) {
		// register single division
		Registry::set('division', $items->current());

		// move to next
		$items->next();
	}

	return $result;
}

// single divisions
function division_id() {
	return Registry::prop('division', 'id');
}

function division_title() {
	return Registry::prop('division', 'title');
}

function division_title_en() {
    return Registry::prop('division', 'title_en');
}

function division_slug() {
	return Registry::prop('division', 'slug');
}

function division_description() {
	return Registry::prop('division', 'description');
}

function division_street() {
	return Registry::prop('division', 'street');
}

function division_city() {
	return Registry::prop('division', 'city');
}

function division_state() {
	return Registry::prop('division', 'state');
}

function division_zip() {
	return Registry::prop('division', 'zip');
}

function division_address() {

	if (!$division_street = division_street()) {
		return 0;
	}

	$address = division_street() . PHP_EOL
			. division_zip() . ', '
			. division_city() . ', '
			. division_state();

	return parse($address);
}

function division_telephone() {
	return Registry::prop('division', 'telephone');
}

function division_fax() {
	return Registry::prop('division', 'fax');
}

function division_url() {
	return base_url('division/' . division_slug());
}

function division_count() {
  return Registry::prop('division', 'staff');
}

function division_countx() {
	return Query::table(Base::table('staffs'))
		->where('division', '=', division_id())
		->where('status', '=', 'active')->count();
}
