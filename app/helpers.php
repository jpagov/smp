<?php

function __($line) {
	$args = array_slice(func_get_args(), 1);

	return Language::line($line, null, $args);
}

function _e($line, $default = null) {
	$args = array_slice(func_get_args(), 1);

	return e(Language::line($line, $default, $args));
}

function is_admin() {
	return strpos(Uri::current(), 'admin') === 0;
}

function is_installed() {
	return Config::get('db') !== null or Config::get('database') !== null;
}

function is_category() {
	return Config::meta('category');
}

function avatar_url() {
  return asset('content/avatar/');
}

function avatar($avatar = 'default-male.jpg') {
  $avatar = avatar_url() . $avatar . '.jpg';
  $avatar = str_replace('.jpg.jpg', '.jpg', $avatar);
  return $avatar;
}

function slug($str, $separator = '-') {
	$str = normalize($str);

	// replace non letter or digits by separator
	$str = preg_replace('#^[^A-z0-9]+$#', $separator, $str);

  return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', $separator, $str)));
}

function acronym($str) {

	if (empty($str)) {
		return;
	}

	$words = explode(' ', $str);
	$acronym = '';

	foreach ($words as $w) {
	  $acronym .= $w[0];
	}
	return trim(strtolower($acronym));
}

function parse($str, $markdown = true) {
	// process tags
	$pattern = '/[\{\{]{1}([a-z]+)[\}\}]{1}/i';

	if(preg_match_all($pattern, $str, $matches)) {
		list($search, $replace) = $matches;

		foreach($replace as $index => $key) {
			$replace[$index] = Config::meta($key);
		}

		$str = str_replace($search, $replace, $str);
	}

	$str = html_entity_decode($str, ENT_NOQUOTES, System\Config::app('encoding'));

	//  Parse Markdown as well?
	if($markdown === true) {
		$md = new Markdown;
		$str = $md->transform($str);
	}

	return $str;
}

function readable_size($size) {
	$unit = array('b','kb','mb','gb','tb','pb');

	return round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
}

function onload() {
  return ' class="' . (is_admin() ? 'admin' : 'login') . '" id="' . explode('/', Uri::current())[1] . '"';
}

function jusa($gred) {
    $gred = intval($gred);

    switch ($gred) {

        case ($gred >= 99):
            return 'TURUS I';

        case ($gred >= 97 && $gred <= 98):
            return 'TURUS II';

        case ($gred >= 95 && $gred <= 97):
            return 'TURUS III';

        case ($gred >= 91 && $gred <= 94):
            return 'A';

        case ($gred >= 88 && $gred <= 90):
            return 'B';

        case ($gred >= 56 && $gred <= 87):
            return 'C';

        default:
            return;
    }
}

function reportTo($desc) {
    $desc = trim(strip_tags(parse($desc), '<ol><ul><li>'));
    return $desc;
}

function array_unshift_assoc(&$arr, $key, $val) {
    $arr = array_reverse($arr, true);
    $arr[$key] = $val;
    return array_reverse($arr, true);
}

function custom_number_format($n, $precision = 1) {
    if ($n < 1000) {

        $n_format = number_format($n);

    } else if ($n >= 1000) {

        $n_format = number_format($n / 1000 , $precision) . 'K';

    } else if ($n < 1000000000) {
        // Anything less than a billion
        $n_format = number_format($n / 1000000, $precision) . 'M';
    } else {
        // At least a billion
        $n_format = number_format($n / 1000000000, $precision) . 'B';
    }

    return $n_format;
}

function active($check) {
	$default = is_category() ? 'categories' : 'divisions';
	if (Uri::current() != '/') {
		if(Uri::current() == 'categories') {
			$default = 'categories';
		} else {
			$default = 'divisions';
		}
	}
	return ($default == $check);
}

function is_active($menu) {
	return (Uri::current() == $menu) ? true : false;
	//return (Uri::current() == $menu) !== 0;
	//return strpos(Uri::current(), 'admin') === 0;
}

function is_class_active($str1, $str2, $addattr = false) {
	return ($str1 == $str2) ? ($addattr) ? ' class="active"' : 'active' : '';
}

function admin_search_term() {
	return Registry::get('admin_search_term');
}

function admin_color($role) {

    switch ($role) {

        case ($role == 'administrator'):
            return 'list-group-item-success';

        case ($role == 'editor'):
            return 'list-group-item-info';

        default:
            return;
    }
}
