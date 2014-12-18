<?php

class Cari {
	private $search, $term, $filter, $result = array();

	public function __construct($term) {
		$this->search = $this->term = $term;
		$this->parse();
		return $this;
	}

	public function parse() {

		preg_match_all("/([^,= ]+):([^= ]+)/", $this->search, $matchs);

		foreach ($matchs[0] as $found) {
			$this->term = str_replace($found, '', $this->term);
		}
		$this->term = trim($this->term);

		$this->result = $this->combine($matchs[1], $matchs[2]);
		$this->result['term'] = trim($this->term);
		$this->filter = array_map(function($var) {
			return explode(',', $var);
		}, $matchs[2]);

		$this->result = array_merge($this->combine($matchs[1], $this->filter), array_diff_key($this->result, $this->combine($matchs[1], $this->filter)));

	}

	public function result() {
		return $this->result;
	}

	public function term() {
		return $this->term;
	}

	public function input() {
		return $this->search;
	}

	private function combine($keys, $values) {
		$result = array();
		foreach ($keys as $i => $k) {
			$result[$k][] = $values[$i];
		}
		array_walk($result, create_function('&$v', '$v = (count($v) == 1)? array_pop($v): $v;'));
		return $result;
	}
}
