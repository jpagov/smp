<?php

class Sitemap {

	private $xml, $exclude = [];
	public static $urlset;

	public function __construct($data, $exlude = true) {

		if (empty($data)) {
			return;
		}

		$this->exclude = Config::sitemap('awesome');

		$this->urlset = new SimpleXMLElement('<urlset>', LIBXML_NOERROR|LIBXML_ERR_NONE|LIBXML_ERR_FATAL);

		// add sitemap ns
		$this->urlset->addAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");

		// add sitemap image ns
		$this->urlset->addAttribute("xmlns:xmlns:image", "http://www.sitemaps.org/schemas/sitemap/0.9");

		foreach ($data as $item) {

			if ($exlude && in_array($item->id, $this->exclude)) {
				continue;
			}

			$this->xml = $this->urlset->addChild('url');
			$this->xml->addChild('loc', Uri::full($item->slug));
			$this->xml->addChild('lastmod', ($item->updated == '0000-00-00 00:00:00' ? Date::sitemap($item->created) : Date::sitemap($item->updated))  );
			$this->xml->addChild('changefreq', ($item->view >= 20000 ? 'daily' : 'weekly'));
			$this->xml->addChild('priority', '1.0');

			$image = $this->xml->addChild('image:image', null, 'http://www.google.com/schemas/sitemap-image/1.1');
			$image->addChild('image:loc',
				Uri::full('content/avatar/' . staff_avatar($item->id, $item->gender)),
				'http://www.google.com/schemas/sitemap-image/1.1');
			$image->addChild('image:caption',
				trim($item->display_name),
				'http://www.google.com/schemas/sitemap-image/1.1');
		}
	}

	public function xml() {
		return $this->urlset->asXML();
	}
}
