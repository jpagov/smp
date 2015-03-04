<?php

/*
 * Set your applications current timezone
 */
date_default_timezone_set(Config::app('timezone', 'UTC'));

/*
 * Define the application error reporting level based on your environment
 */
switch(constant('ENV')) {
	case 'local':
	case 'dev':
		ini_set('display_errors', true);
		error_reporting(-1);
		break;

	default:
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
}

/*
 * Set autoload directories to include your app models and libraries
 */
Autoloader::directory(array(
	APP . 'models',
	APP . 'libraries'
));

/**
 * Helpers
 */
require APP . 'helpers' . EXT;

/**
 * API prefix
 */
define('API', Config::api('prefix') . Config::api('version'));

/**
 * Composer autoload
 */
$composer = PATH . 'vendor/autoload' . EXT;
file_exists($composer) and require $composer;

/**
 * App setup
 */
App::setup();

/**
 * Import defined routes
 */

if(is_admin()) {
	require APP . 'routes/admin/admin' . EXT;
	require APP . 'routes/admin/api' . EXT;
	require APP . 'routes/admin/branchs' . EXT;
	require APP . 'routes/admin/categories' . EXT;
	require APP . 'routes/admin/comments' . EXT;
	require APP . 'routes/admin/divisions' . EXT;
	require APP . 'routes/admin/fields' . EXT;
	require APP . 'routes/admin/menu' . EXT;
	require APP . 'routes/admin/metadata' . EXT;
	require APP . 'routes/admin/pages' . EXT;
	require APP . 'routes/admin/plugins' . EXT;
	require APP . 'routes/admin/profile' . EXT;
	require APP . 'routes/admin/ratings' . EXT;
	require APP . 'routes/admin/reports' . EXT;
	require APP . 'routes/admin/sectors' . EXT;
	require APP . 'routes/admin/staffs' . EXT;
	require APP . 'routes/admin/revisions' . EXT;
	require APP . 'routes/admin/units' . EXT;
	require APP . 'routes/admin/users' . EXT;
	require APP . 'routes/admin/variables' . EXT;
	require APP . 'routes/admin/cron/slug' . EXT;
	require APP . 'routes/admin/cron/hierarchy' . EXT;
	require APP . 'routes/admin/cron/import' . EXT;
	require APP . 'routes/admin/report/log' . EXT;
	require APP . 'routes/admin/report/confirm' . EXT;
} else {
	require APP . 'routes/public/action' . EXT;
	require APP . 'routes/public/api' . EXT;
	require APP . 'routes/public/email' . EXT;
	require APP . 'routes/public/post' . EXT;
	require APP . 'routes/public/search' . EXT;
	require APP . 'routes/public/sitemap' . EXT;
	require APP . 'routes/public/site' . EXT;
}
