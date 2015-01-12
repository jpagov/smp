<?php
$base = PATH . 'themes' . DS . Config::meta('theme') . DS;
$css = is_staff() ? 'staff-critical.css' : 'home-critical.css';

$asset_path = $base . 'assets/css/' . $css;

if (is_readable($asset_path)) {
	echo '<style>' . file_get_contents($asset_path) . '</style>';
}

