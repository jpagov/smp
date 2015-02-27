<?php

class Paginator {

	public $results = array();
	public $count = 0;
	public $page = 1;
	public $perpage = 10;
	public $range = 5;

	public $first = 'First';
	public $last = 'Last';
	public $next = 'Next';
	public $prev = 'Previous';

	public function __construct($results, $count, $page, $perpage, $url) {
		$this->first = __('site.first');
		$this->last = __('site.last');
		$this->next = __('site.next');
		$this->prev = __('site.prev');
		$this->results = $results;
		$this->count = $count;
		$this->page = $page;
		$this->perpage = $perpage;
		$this->url = rtrim($url, '/');
		$this->querystring = '';

		if ($_SERVER['QUERY_STRING']) {
			// convert everything to variable
			parse_str($_SERVER['QUERY_STRING'], $qs);
			// fix array, and decode url
			$this->querystring = '?' . urldecode(preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', http_build_query($qs)));
		}
	}

	public function base_link() {
		return $this->page;
	}

	public function canonical_base_link() {
		return '<link rel="canonical" href="' . $this->url . '">' ;
	}

	public function next_link($text = null, $default = '', $canonical = true) {

		if(is_null($text)) $text = $this->next;

		$pages = ceil($this->count / $this->perpage);

		if($this->page < $pages) {
			$page = $this->page + 1;

			$url = $this->url . '/' . $page . $this->querystring;

			return ($canonical)
				? '<link rel="next" href="' . $url . '">'
				: '<a href="' . $url . '">' . $text . ' <span aria-hidden="true">&rarr;</span></a>';
		}

		return $default;
	}

	public function prev_link($text = null, $default = '', $canonical = true) {
		if(is_null($text)) $text = $this->prev;

		if($this->page > 1) {
			$page = $this->page - 1;

			return PHP_EOL . ($canonical)
				? '<link rel="prev" href="' . $this->url . '/' . $page . $this->querystring . '">'
				: '<a href="' . $this->url . '/' . $page . $this->querystring . '"><span aria-hidden="true">&larr;</span>' . $text . '</a>';
		}

		return $default;
	}

	public function links() {
		$html = '';

		$pages = ceil($this->count / $this->perpage);

		if($pages > 1) {

			if($this->page > 1) {
				$page = $this->page - 1;

				$html = '<li><a href="' . $this->url . $this->querystring . '">' . $this->first . '</a></li>
					<li><a href="' . $this->url . '/' . $page . $this->querystring . '">' . $this->prev . '</a></li>';
			}

			for($i = $this->page - $this->range; $i < $this->page + $this->range; $i++) {
				if($i < 0) continue;

				$page = $i + 1;

				if($page > $pages) break;

				if($page == $this->page) {
					$html .= '<li class="active"><span>' . $page . '<span class="sr-only">(current)</span></span></li>';
				}
				else {
					$html .= '<li><a href="' . $this->url . '/' . $page . $this->querystring .'">' . $page . '</a></li>';
				}
			}

			if($this->page < $pages) {
				$page = $this->page + 1;

				$html .= '<li><a href="' . $this->url . '/' . $page . $this->querystring .'">' . $this->next . '</a></li>
					<li><a href="' . $this->url . '/' . $pages . $this->querystring .'">' . $this->last . '</a></li>';
			}

		}

		return $html;
	}

}
