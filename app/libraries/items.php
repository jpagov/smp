<?php

class Items implements Iterator {

	private $position = 0, $array = array();

	public function __construct($items = array()) {
		$this->position = 0;
		$this->array = $items;
	}

	public function rewind() {
		$this->position = 0;
	}

	public function current() {
		return $this->array[$this->position];
	}

	public function key() {
		return $this->position;
	}

	public function next() {
		++$this->position;
	}

	public function valid() {
		return isset($this->array[$this->position]);
	}

	public function length() {
		return count($this->array);
	}

	public function raw() {
		return $this->array;
	}

	public function remove($keys = array()) {
		if (! is_array($keys)) {
			$keys = array($keys);
		}
		foreach ($keys as $key) {
			unset($this->array[$key]);
		}
	}

}
