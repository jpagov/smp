<?php

class Term {
	private $term = array();
	private $raw = array();
	private $division = array();
	private $search = '';
	private $in = array();
	private $keyword = array('in', 'division');
	private $match = array();

	public function __construct($str) {
		$this->term = (is_array($str)) ? implode(' ', array_map('trim', $str)) : trim($str);
		$this->search = $this->term;
		$this->raw = str_getcsv($this->term, ' ');
		$this->parser();
	}

	public function search() {
		return $this->search;
	}

	public function raw() {
		return $this->raw;
	}

	public function keyword() {
		return $this->match;
	}

	public function term() {
		return $this->term;
	}

	public function get($type = 'division') {
		return $this->$type;
	}

	private function parser() {

		$this->term = $this->raw;

		foreach ($this->raw as $key => $value) {
			foreach ($this->keyword as $needle) {
				$find = $needle . ':';
				if (strpos($value, $find) !== false) {
					$this->match[] = $value;
					unset($this->term[$key]);
				}
			}
		}

		foreach ($this->match as $match) {
			list($mk, $mv) = explode(':', $match);
			$this->$mk = explode(',', $mv);
		}

		$this->term = implode(' ', $this->term);
	}
}
