<?php

class Sitemap {

	private $xml;
	public static $urlset;

	public function __construct($data) {

		if (empty($data)) {
			return;
		}

		$this->urlset = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" />', LIBXML_NOERROR|LIBXML_ERR_NONE|LIBXML_ERR_FATAL);

		foreach ($data as $item) {

			$this->xml = $this->urlset->addChild('url');
			$this->xml->addChild('loc', Uri::full($item->slug));
			$this->xml->addChild('lastmod', ($item->updated == '0000-00-00 00:00:00' ? $item->created : $item->updated)  );
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
