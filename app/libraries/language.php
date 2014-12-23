<?php

class Language {

	private static $lines = array();

	/**
	 * Try and detect the current lang
	 *
	 * @return string
	 */
	public static function detect() {

		$language = Config::app('language');

		// make sure we have cookie lang, if not lets start again
		if (!$cookie = Cookie::read(Config::app('prefix') . '_lang')) {
			Cookie::write(Config::app('prefix') . '_lang', $language, Config::session('lifetime'));
		} else {
			$language = $cookie;
		}

		// set the new lang from user input
		if (!empty($_SERVER['QUERY_STRING'])) {
			parse_str($_SERVER['QUERY_STRING']);

			if (isset($lang) and in_array($lang, static::all(true))) {
				$language = filter_var($lang, FILTER_SANITIZE_URL);
			}

			$language = filter_var($language, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			Cookie::write(Config::app('prefix') . '_lang', $language, Config::session('lifetime'));
		}

		return $language;

	}

	public static function all($listonly = false, $object = false) {
		$language = array();
		$fi = new FilesystemIterator(APP . 'language', FilesystemIterator::SKIP_DOTS);

		foreach($fi as $file) {

			if($file->isDir()) {

				$lang = $file->getFilename();

				if ($listonly ) {
					if ($object) {
						if($about = static::parse($lang)) {
							$language[] = $about;
						}
					} else {
						$language[] = $lang;
					}

				} else {
					if($about = static::parse($lang)) {
						$language[$lang] = $about;
					}
				}
			}
		}

		ksort($language);

		return $language;
	}

	private static function path($file) {
		$language = static::detect();

		return APP . 'language/' . $language . '/' . $file . '.php';
	}

	private static function load($file) {
		if(is_readable($lang = static::path($file))) {
			static::$lines[$file] = require $lang;
		}
	}

	public static function line($key, $default = '', $args = array()) {
		$parts = explode('.', $key);

		if(count($parts) > 1) {
			$file = array_shift($parts);
			$line = array_shift($parts);
		}

		if(count($parts) == 1) {
			$file = 'global';
			$line = array_shift($parts);
		}

		if( ! isset(static::$lines[$file])) {
			static::load($file);
		}

		if(isset(static::$lines[$file][$line])) {
			$text = static::$lines[$file][$line];
		}
		else if($default) {
			$text = $default;
		}
		else {
			$text = $key;
		}

		if(count($args)) {
			return call_user_func_array('sprintf', array_merge(array($text), $args));
		}

		return $text;
	}

	public static function parse($lang) {
		$file = APP . 'language/' . $lang . '/about.txt';


		if( ! is_readable($file)) {
			return false;
		}

		// read file into a array
		$contents = explode("\n", trim(file_get_contents($file)));
		$about = array();

		foreach(array('id', 'name', 'author', 'site', 'license') as $index => $key) {
			// temp value
			$about[$key] = '';

			// find line if exists
			if( ! isset($contents[$index])) {
				continue;
			}

			$line = $contents[$index];

			// skip if not separated by a colon character
			if(strpos($line, ":") === false) {
				continue;
			}

			$parts = explode(":", $line);

			// remove the key part
			array_shift($parts);

			// in case there was a colon in our value part glue it back together
			$value = implode('', $parts);

			$about[$key] = trim($value);
		}

		return $about;
	}

}
