<?php

Route::get('sitemap.xml', function() {

	$xml = '<sitemapindex>';

	// Priority ;p
	$xml .= '<sitemap>';
	$xml .= '<loc>' . Uri::full('sitemap-awesome') . '.xml</loc>';
	$xml .= '</sitemap>';

	foreach (Division::listing() as $division) {
		$xml .= '<sitemap>';
		$xml .= '<loc>' . Uri::full('sitemap-' . $division->slug) . '.xml</loc>';
		$xml .= '</sitemap>';
	}

	$xml .= '</sitemapindex>';

	return Response::create($xml, 200, array('content-type' => 'application/xml'));
});

Route::get('sitemap-awesome.xml', function() {

	$awesome_staff = [487];

	$query = Staff::where_in('id', $awesome_staff);

	$total = $query->count();

	$staffs = $query->get(array('id', 'display_name', 'gender', 'slug', 'view', 'created', 'updated'));

	$sitemap = new Sitemap($staffs);

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
