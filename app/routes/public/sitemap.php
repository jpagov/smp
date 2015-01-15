<?php

Route::get('sitemap.xml', function() {

	$sitemapindex = new SimpleXMLElement('<sitemapindex></sitemapindex>');
	$sitemapindex->addAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");

	// example priority for high profile ;p
	$xml = $sitemapindex->addChild('sitemap');
	$xml->addChild('loc', Uri::full('sitemap-awesome.xml'));

	foreach (Division::listing() as $division) {
		$xml = $sitemapindex->addChild('sitemap');
		$xml->addChild('loc', Uri::full('sitemap-' . $division->slug . '.xml'));
	}

	return Response::create($sitemapindex->asXML(), 200, array('content-type' => 'application/xml'));
});

Route::get('sitemap-awesome.xml', function() {

	$query = Staff::where_in('id', Config::sitemap('awesome'));

	$total = $query->count();

	$staffs = $query->get(array('id', 'display_name', 'gender', 'slug', 'view', 'created', 'updated'));

	$sitemap = new Sitemap($staffs, false);

	return Response::create($sitemap->xml(), 200, array('content-type' => 'application/xml'));

});

Route::get('sitemap-(:any).xml', function($slug) {

	if( ! $division = Division::slug($slug)) {
		return Response::create(new Template('404'), 404);
	}

	$query = Staff::where('status', '=', 'active')
		->where('division', '=', $division->id);

	$total = $query->count();

	$staffs = $query->get(array('id', 'display_name', 'gender', 'slug', 'view', 'created', 'updated'));

	$sitemap = new Sitemap($staffs);

	return Response::create($sitemap->xml(), 200, array('content-type' => 'application/xml'));
});
