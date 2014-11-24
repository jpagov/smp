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

foreach (new FilesystemIterator(APP . 'routes/' . ( is_admin() ? 'admin' : 'public' ) . '/', FilesystemIterator::SKIP_DOTS) as $file) {
	require $file->getPathname();
}
