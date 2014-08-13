<?php

/**
 * Theme functions for staffs
 */
function has_staffs() {
	return Registry::get('total_staffs', 0) > 0;
}

function staffs() {
	$staffs = Registry::get('staffs');

	if($result = $staffs->valid()) {
		// register single staff
		Registry::set('staff', $staffs->current());

		// move to next
		$staffs->next();
	}
	// back to the start
	else $staffs->rewind();

	return $result;
}

function staffs_next($text = 'Next &rarr;', $default = '') {
	$total = Registry::get('total_staffs');
	$offset = Registry::get('page_offset');
	$per_page = Config::meta('staffs_per_page');
	$page = Registry::get('page');
	$url = base_url($page->slug . '/');

	// filter division
	if($division = Registry::get('staff_division')) {
		$url = base_url('division/' . $division->slug . '/');
	}

	$pagination = new Paginator(array(), $total, $offset, $per_page, $url);

	return $pagination->prev_link($text, $default);
}

function staffs_prev($text = '&larr; Previous', $default = '') {
	$total = Registry::get('total_staffs');
	$offset = Registry::get('page_offset');
	$per_page = Config::meta('staffs_per_page');
	$page = Registry::get('page');
	$url = base_url($page->slug . '/');

	// filter division
	if($division = Registry::get('staff_division')) {
		$url = base_url('division/' . $division->slug . '/');
	}

	$pagination = new Paginator(array(), $total, $offset, $per_page, $url);

	return $pagination->next_link($text, $default);
}

function staffs_paging() {
    $total = Registry::get('total_staffs');
    $offset = Registry::get('page_offset');
    $per_page = Config::meta('staffs_per_page');
    $page = Registry::get('page');
    $url = base_url($page->slug . '/');

    // filter division
    if($division = Registry::get('staff_division')) {
        $url = base_url('division/' . $division->slug . '/');
    }

    $pagination = new Paginator(array(), $total, $offset, $per_page, $url);

    return $pagination;
}

function total_staffs() {
	return Registry::get('total_staffs');
}

function has_pagination() {
	return Registry::get('total_staffs') > Config::meta('staffs_per_page');
}

function staffs_per_page() {
	return min(Registry::get('total_staffs'), Config::meta('staffs_per_page'));
}

function division() {
    return Registry::get('division_slug');
}
