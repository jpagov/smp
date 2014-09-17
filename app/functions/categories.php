<?php

/**
 * Theme functions for categories
 */

function total_categories() {
	if( ! $categories = Registry::get('categories')) {
		$categories = Category::get();

		$categories = new Items($categories);

		Registry::set('categories', $categories);
	}

	return $categories->length();
}

// loop categories
function categories() {
	if( ! total_categories()) return false;

	$items = Registry::get('categories');

	if($result = $items->valid()) {
		// register single category
		Registry::set('category', $items->current());

		// move to next
		$items->next();
	}

	return $result;
}

// single categories
function category_id() {
	return Registry::prop('category', 'id');
}

function category_title() {
	return Registry::prop('category', 'title');
}

function category_title_en() {
    return Registry::prop('category', 'title_en');
}

function category_slug() {
	return Registry::prop('category', 'slug');
}

function category_description() {
	return Registry::prop('category', 'description');
}

function category_hierarchy() {
	return Registry::prop('category', 'hierarchy');
}

function category_view() {
	return Registry::prop('category', 'view');
}

function category_url() {

	$url = 'division';

	if ($hierarchy = Hierarchy::find(category_hierarchy())) {

		if ($division = Division::find($hierarchy->division)) {
			$url .= '/' . $division->slug;
		}

		if ($branch = Branch::find($hierarchy->branch)) {
			$url .= '/' . $branch->slug;
		}

		if ($sector = Sector::find($hierarchy->sector)) {
			$url .= '/' . $sector->slug;
		}

		if ($unit = Unit::find($hierarchy->unit)) {
			$url .= '/' . $unit->slug;
		}

		return base_url($url);
	}
}

function category_count() {
	return Query::table(Base::table('staffs'))
		->where('category', '=', category_id())
		->where('status', '=', 'active')->count();
}
