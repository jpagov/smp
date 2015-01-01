<?php

/**
 * Theme functions for meta
 */
function site_name() {
	return _e(Config::meta('sitename'));
}

function site_description() {
	// return is_staff() ? page_rating() . ' - ' . staff_description() : (base_url() == current_url()) ? 'site.home_description' : Config::meta('description');

	if (is_staff()) {
		return page_rating() . ' - ' . staff_description();
	} elseif(base_url() == current_url()) {
		return 'site.home_description';
	} else {
		return Config::meta('description');
	}
}

function site_meta($key, $default = '') {
	return Config::meta('custom_' . $key, $default);
}
