<?php

/**
 * Theme helpers functions
 */
function full_url($url = '') {
	return Uri::full($url);
}

function base_url($url = '') {
    return Uri::to($url);
}

function theme_url($file = '') {
	$theme_folder = Config::meta('theme');
	$base = 'themes' . '/' . $theme_folder . '/';

	return asset($base . ltrim($file, '/'));
}

function theme_include($file) {
	$theme_folder = Config::meta('theme');
	$base = PATH . 'themes' . DS . $theme_folder . DS;

	if(is_readable($path = $base . ltrim($file, DS) . EXT)) {
		return require $path;
	}
}

function asset_url($extra = '') {
	return asset('app/views/assets/' . ltrim($extra, '/'));
}

function current_url() {
	return base_url(Uri::current());
}

function rss_url() {
    return base_url('feeds/rss');
}

//  Custom function helpers
function bind($page, $fn) {
	Events::bind($page, $fn);
}

function receive($name = '') {
	return Events::call($name);
}

function body_class() {
	$classes = array();

	//  Get the URL slug
	$parts = explode('/', Uri::current());
	$classes[] = count($parts) ? trim(current($parts)) : 'index';

    //  Is it a posts page?
    if(is_staffpage()) {
        $classes[] = 'staffs';
    }

	//  Is it the homepage?
	if(is_homepage()) {
		$classes[] = 'home';
	}

	return implode(' ', array_unique($classes));
}

function fix_name($name) {
	return Registry::get('division') !== null;
}

// page type helpers
function is_homepage() {
	return Registry::prop('page', 'id') == Config::meta('home_page');
}

function is_managementpage() {
  return Registry::prop('page', 'id') == Config::meta('management_page');
}

function is_staffpage() {
  return Registry::prop('page', 'id') == Config::meta('staffs_page');
}

function is_staff() {
  return Registry::get('staff') !== null;
}

function is_page() {
	return Registry::get('page') !== null;
}

function is_division() {
	return Registry::get('division') !== null;
}

function division_has_meta() {
	return (division_address() or division_telephone() or division_fax()) ? true : false;
}

function is_search() {
	return Registry::prop('page', 'id') === 0;
}

function truncate($text = '', $chars = 100) {
	return strlen($text) > $chars ? substr($text, 0, $chars) . "..." : $text;
}
