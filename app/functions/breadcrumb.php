<?php

/**
 * Theme functions for breadcrumb
 */

function total_breadcrumb() {

	return ($breadcrumbs = Registry::get('breadcrumb')) ? count($breadcrumbs) : 0;
}

// loop breadcrumbs
function breadcrumbs() {
	if( ! total_breadcrumb()) return false;

	$breadcrumbs = Registry::get('breadcrumb');
	return $breadcrumbs;
}

function breadcrumb_hierarchy($id) {
	if($hierarchy = Hierarchy::where('id', '=', $id)->fetch()) {

		$org = array();

		foreach (array('division', 'branch', 'sector', 'unit') as $item) {
			if ($hierarchy->$item) {
				if ($h = $item::find($hierarchy->$item)) {

					$org[$item] = array(
						'id' => $h->id,
						'title' => $h->title,
						'slug' => $h->slug,
						'url' => breadcrumb_hierarchy_url($id, $item),
					);
				}
			}
		}

		return $org;

	}
	return false;
}

function breadcrumb_hierarchy_url($id, $type = 'division') {

	$url = array();

	if($hierarchy = Hierarchy::where('id', '=', $id)->fetch()) {
		foreach (array('division', 'branch', 'sector', 'unit') as $org) {
			if ($hierarchy->$org) {
				if ($h = $org::find($hierarchy->$org)) {
					$url[$org] = $h->slug;
				}
			}
		}
	}

	return implode('/', array_splice($url, 0, array_search($type,array_keys($url))+1));
}

