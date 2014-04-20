<?php

class Notify {

	public static $types = array('danger', 'notice', 'success', 'warning');
	public static $wrap = '%s';
	public static $mwrap = '<div class="alert alert-%s alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>%s</div>';

	public static function add($type, $message) {
		if(in_array($type, static::$types)) {
			$messages = array_merge((array) Session::get('messages.' . $type), (array) $message);

			Session::put('messages.' . $type, $messages);
		}
	}

	public static function read() {
		$types = Session::get('messages');

		// no messages no problem
		if(is_null($types)) return '';

		$html = '';

		foreach($types as $type => $messages) {
			foreach($messages as $message) {
				$html .= sprintf(static::$mwrap, $type, implode('<br>', (array) $message));
			}
		}

		Session::erase('messages');

		return sprintf(static::$wrap, $html);
	}

	public static function __callStatic($method, $paramaters = array()) {
		static::add($method, array_shift($paramaters));
	}

}