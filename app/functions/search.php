<?php

/**
*	Theme functions for search
*/
function has_search_results() {
	return Registry::get('total_staffs', 0) > 0;
}

function total_search_results() {
	return Registry::get('total_staffs', 0);
}

function search_results() {
	$staffs = Registry::get('search_results');

	if($result = $staffs->valid()) {
		// register single staff
		Registry::set('staff', $staffs->current());

		// move to next
		$staffs->next();
	}

	return $result;
}

function search_term() {
	return Registry::get('search_term');
}

function has_search_pagination() {
	return Registry::get('total_staffs') > Config::meta('staffs_per_page');
}

function search_links($first = 'First', $next = 'Next', $prev = 'Prev', $last = 'Last') {

	$per_page = Config::meta('staffs_per_page');
	$page = Registry::get('page_offset');

	$offset = ($page - 1) * $per_page;
	$total = Registry::get('total_staffs');

	$search_page = Registry::get('page');
	$nexturl = (($page + 1) == 1) ? '' : '/' . ($page + 1);
	$term = Registry::get('search_term');

	$url = base_url($search_page->slug . $nexturl . '/?term=' . $term);

	$html = '';

	$pages = ceil($total / $per_page);
	$range = 4;

	if($pages > 1) {

		if($page > 1) {
			$local = $page - 1;

			$html = '<li><a href="' . $url . '">' . $first . '</a></li>
				<li><a href="' . $url . '/' . $local . '">' . $prev . '</a></li>';
		}

		for($i = $page - $range; $i < $page + $range; $i++) {
			if($i < 0) continue;

			$local = $i + 1;

			if($local > $pages) break;

			if($local == $page) {
				$html .= '<li class="active"><span>' . $local . '<span class="sr-only">(current)</span></span></li>';
			}
			else {
				$html .= '<li><a href="' . $url . '/' . $local . '">' . $local . '</a></li>';
			}
		}

		if($page < $pages) {
			$local = $page + 1;

			$html .= '<li><a href="' . $url . '/' . $local . '">' . $next . '</a></li>
				<li><a href="' . $url . '/' . $pages . '">' . $last . '</a></li>';
		}

	}

	return $html;
}

function search_next($text = 'Next', $default = '') {
	$per_page = Config::meta('staffs_per_page');
	$page = Registry::get('page_offset');

	$offset = ($page - 1) * $per_page;
	$total = Registry::get('total_staffs');

	$pages = floor($total / $per_page);

	$search_page = Registry::get('page');
	$next = $page + 1;
	$term = Registry::get('search_term');
	Session::put(slug($term), $term);

	$url = base_url($search_page->slug . '/' . $term . '/' . $next);

	if(($page - 1) < $pages) {
		return '<a href="' . $url . '">' . $text . '</a>';
	}

	return $default;
}

function search_prev($text = 'Previous', $default = '') {
	$per_page = Config::get('meta.staffs_per_page');
	$page = Registry::get('page_offset');

	$offset = ($page - 1) * $per_page;
	$total = Registry::get('total_staffs');

	$pages = ceil($total / $per_page);

	$search_page = Registry::get('page');
	$prev = $page - 1;
	$term = Registry::get('search_term');
	Session::put(slug($term), $term);

	$url = base_url($search_page->slug . '/' . $term . '/' . $prev);

	if($offset > 0) {
		return '<a href="' . $url . '">' . $text . '</a>';
	}

	return $default;
}

function search_url() {
	return base_url('search');
}

function search_form_input($extra = '') {
	return '<input name="term" type="text" ' . $extra . ' value="' . search_term() . '">';
}

function search_form_notifications() {
  return Notify::read();
}
