<?php

class Paginator {

	public $results = array();
	public $count = 0;
	public $page = 1;
	public $perpage = 10;

	public $first = 'First';
	public $last = 'Last';
	public $next = 'Next';
	public $prev = 'Previous';

	public function __construct($results, $count, $page, $perpage, $url) {
		$this->results = $results;
		$this->count = $count;
		$this->page = $page;
		$this->perpage = $perpage;
		$this->url = rtrim($url, '/');
	}

	public function next_link($ajax = false, $text = null, $default = '') {

		if(is_null($text)) $text = $this->next;

		$qs = '';

		if ($ajax and is_admin()) {

			parse_str($_SERVER['QUERY_STRING']);

			if (isset($type) or isset($division)) {
				$type = filter_var($type, FILTER_SANITIZE_SPECIAL_CHARS);
				$division = filter_var($division, FILTER_SANITIZE_SPECIAL_CHARS);

				$qs .= '?' . http_build_query(array('type' => $type, 'division' => $division));
			}
		}

		$pages = ceil($this->count / $this->perpage);

		if($this->page < $pages) {
			$page = $this->page + 1;

			$url = $this->url . '/' . $page;

			return '<a href="' . $url . '">' . $text . ' <span aria-hidden="true">&rarr;</span></a>';
		}

		return $default;
	}

	public function prev_link($text = null, $default = '') {
		if(is_null($text)) $text = $this->prev;

		if($this->page > 1) {
			$page = $this->page - 1;

			return '<a href="' . $this->url . '/' . $page . '"><span aria-hidden="true">&larr;</span>' . $text . '</a>';
		}

		return $default;
	}

	public function links() {
		$html = '';

		$pages = ceil($this->count / $this->perpage);
		$range = 4;

		if($pages > 1) {

			if($this->page > 1) {
				$page = $this->page - 1;

				$html = '<li><a href="' . $this->url . '">' . $this->first . '</a></li>
					<li><a href="' . $this->url . '/' . $page . '">' . $this->prev . '</a></li>';
			}

			for($i = $this->page - $range; $i < $this->page + $range; $i++) {
				if($i < 0) continue;

				$page = $i + 1;

				if($page > $pages) break;

				if($page == $this->page) {
					$html .= '<li class="active"><span>' . $page . '<span class="sr-only">(current)</span></span></li>';
				}
				else {
					$html .= '<li><a href="' . $this->url . '/' . $page . '">' . $page . '</a></li>';
				}
			}

			if($this->page < $pages) {
				$page = $this->page + 1;

				$html .= '<li><a href="' . $this->url . '/' . $page . '">' . $this->next . '</a></li>
					<li><a href="' . $this->url . '/' . $pages . '">' . $this->last . '</a></li>';
			}

		}

		return $html;
	}

}
