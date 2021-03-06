<?php

class Template extends View {

	public function __construct($template, $vars = array()) {
		// base path
		$base = PATH . 'themes' . DS . Config::meta('theme') . DS;

		// custom article and page templates
		if($template == 'page' or $template == 'staff') {
			if($item = Registry::get($template)) {
				if(is_readable($base . $template . '-' . $item->slug . EXT)) {
					$template .= '-' . $item->slug;
				} elseif (is_readable($base . $template . 's/' . $template . '-' . $item->slug . EXT)) {
					$template .= 's/' . $template . '-' . $item->slug;
				}
			}
		}

		if (is_public()) {

			if (site_meta('use_table', true)) {
				$template .= !in_array($template, ['help', '404', 'page']) ? '-table' : '';
			}

			if(is_readable($base . 'public/' . $template . EXT)) {
				$template = 'public/' . $template;
			}
		}
		//dd($base . $template . EXT);
		$this->path = $base . $template . EXT;
		$this->vars = array_merge($this->vars, $vars);
	}

	public function __toString() {
		return $this->render();
	}

}
