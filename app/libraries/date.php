<?php

class Date {

	/*
	 * Format a date as per users timezone and format
	 */
	public static function format($date, $format = null) {
		// set the meta format
		if(is_null($format)) {
			$format = Config::meta('date_format', 'jS F, Y');
		}

		$date = new DateTime($date, new DateTimeZone('GMT'));
		$date->setTimezone(new DateTimeZone(Config::app('timezone')));

		return $date->format($format);
	}

	public static function formatLocalized($date, $format = null) {
		// set the meta format for localized date
		if(is_null($format)) {
			$format = Config::meta('date_format_localized', 'd MMMM y');
		}

		$date = new DateTime($date, new DateTimeZone('GMT'));

		$fmt = new IntlDateFormatter(
			Config::app('language'),
			IntlDateFormatter::FULL,
			IntlDateFormatter::FULL,
			Config::app('timezone', 'UTC'),
			IntlDateFormatter::GREGORIAN,
			$format
		);

		return $fmt->format($date);

	}

	/*
	 * All database dates are stored as GMT
	 */
	public static function mysql($date) {
		$date = new DateTime($date, new DateTimeZone('GMT'));

		return $date->format('Y-m-d H:i:s');
	}

	/*
	 * For sitemap
	 */
	public static function sitemap($date) {
		$date = new DateTime($date, new DateTimeZone('GMT'));

		return $date->format('c');
	}

}
