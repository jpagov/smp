<?php

/**
* Important pages
*/
$home_page = Registry::get('home_page');
$staffs_page = Registry::get('staffs_page');
$management_page = Registry::get('management_page');

$tmp = $staffs_page->slug;
$staffs_page->slug = empty($tmp) ? '/' : $staffs_page->slug;


/**
* The Home page
*/
if($home_page->id != $staffs_page->id) {
	Route::get(array('/', $home_page->slug, 'divisions'), function() use($home_page) {

		if($home_page->redirect) {
			return Response::redirect($home_page->redirect);
		}

		Registry::set('page', $home_page);

		return new Template('page');
	});
}

/**
* Staff listings page
*/
$routes = array($staffs_page->slug, $staffs_page->slug . '(:num)');

/**
*if($home_page->id == $staffs_page->id) {
*    array_unshift($routes, '/');
*}
*/


Route::get($routes, function($offset = 1) use($staffs_page) {

	if($offset > 0) {
		// get public listings
		list($total, $staffs) = Staff::listing($offset, $per_page = Config::meta('staffs_per_page'));

	} else {
		return Response::create(new Template('404'), 404);
	}

	// get the last page
	$max_page = ($total > $per_page) ? ceil($total / $per_page) : 1;

	// stop users browsing to non existing ranges
	if(($offset > $max_page) || ($offset < 1)) {
		return Response::create(new Template('404'), 404);
	}

	$staffs = new Items($staffs);

	Registry::set('staffs', $staffs);
	Registry::set('total_staffs', $total);
	Registry::set('page', $staffs_page);
	Registry::set('page_offset', $offset);

	return new Template('staffs');
});


Route::get('category/(:any)', function($slug) {

	if (!$category = Category::slug($slug)) {
		return Response::create(new Template('404'), 404);
	}

	Category::update($category->id, array('view' => $category->view +1));

	Stats::log($category->id, 'category');

	$url = 'division';

	if ($hierarchy = Hierarchy::find($category->hierarchy)) {

		if ($division = Division::find($hierarchy->division)) {
			$url .= '/' . $division->slug;
		}

		if ($branch = Branch::find($hierarchy->branch)) {
			$url .= '/' . $branch->slug;
		}

		if ($sector = Sector::find($hierarchy->sector)) {
			$url .= '/' . $sector->slug;
		}

		if ($unit = Unit::find($hierarchy->unit)) {
			$url .= '/' . $unit->slug;
		}

	}

	return Response::redirect($url);
});

Route::get('content/avatar/(:any).jpg', function($email) {

	if( (! $staff = Staff::email($email)) || $staff->status == 'inactive') {
		return Response::redirect('content/avatar/default-male.jpg');
	}

	$storage = PATH . 'content' . DS . 'avatar' . DS;

	$default = ($staff->gender == 'M') ? 'default-male.jpg' : 'default-female.jpg';

	$avatar = preg_replace( "/^([^@]+)(@.*)$/", "$1", $staff->email) . '.jpg';

	$redirect = (file_exists($storage . $avatar) ? $avatar : $default);

	return Response::redirect('content/avatar/' . $redirect);
});

/**
* View staffs by hierarchies
*/

// top management
Route::get(array('top-management', 'top-management/(:num)'), function($offset = 1) use ($management_page) {

	//$staffs_page->slug = '/top-management';

	if($offset > 0) {
		// get public listings
		list($total, $staffs) = Staff::listing($offset, $per_page = Config::meta('staffs_per_page'), null, true);

	} else {
		return Response::create(new Template('404'), 404);
	}

	// get the last page
	$max_page = ($total > $per_page) ? ceil($total / $per_page) : 1;

	// stop users browsing to non existing ranges
	if(($offset > $max_page) || ($offset < 1)) {
		return Response::create(new Template('404'), 404);
	}

	$staffs = new Items($staffs);

	Registry::set('staffs', $staffs);
	Registry::set('total_staffs', $total);
	Registry::set('page', $management_page);
	Registry::set('page_offset', $offset);

	return new Template('staffs');
});

// redirect for division using id
Route::get('division/(:num)', function($id) {

	if( ! $division = Division::find($id )) {
		return Response::create(new Template('404'), 404);
	}

	return Response::redirect('division/' . $division->slug);

});

Route::get(array('division/(:any)', 'division/(:any)/(:num)'), function($division_slug, $offset = 1) use ($staffs_page) {

	if( ! $division = Division::slug($division_slug )) {
		return Response::create(new Template('404'), 404);
	}

	Staff::update($division->id, array('view' => $division->view +1));

	Stats::log($division->id, 'division');

	$hierarchies = array();
	$hierarchies['division'] = $division;

	// get public listings
	list($total, $staffs) = Staff::listing($offset, $per_page = Config::meta('staffs_per_page'), $hierarchies);

	// get branch under this division
	list($count, $branchs) = Branch::listing($division->id, $offset, $per_page = Config::meta('staffs_per_page'));

	//dd($branchs);

	$breadcrumbs = array('division' => $division->id);

	if($hierarchy = Hierarchy::search($breadcrumbs)) {
		$breadcrumb = breadcrumb_hierarchy($hierarchy->id);

		$bc = array();
		foreach ($breadcrumb as $key => $value) {
			if (in_array($key, array_keys($breadcrumbs))) {
				$bc[$key] = $value;
			}
		}
		Registry::set('breadcrumb', $bc);
	}

	// get the last page
	$max_page = ($total > $per_page) ? ceil($total / $per_page) : 1;

	// stop users browsing to non existing ranges
	if(($offset > $max_page) || ($offset < 1)) {
		return Response::create(new Template('404'), 404);
	}

	$staffs = new Items($staffs);
	$branchs = new Items($branchs);

	Registry::set('staffs', $staffs);
	Registry::set('branchs', $branchs);
	Registry::set('total_staffs', $total);
	Registry::set('page', $staffs_page);
	Registry::set('page_offset', $offset);
	Registry::set('staff_division', $division);
	Registry::set('division_slug', $division_slug);
	Registry::set('division', $division);

	return new Template('staffs');
});

/* TODO: separate route
 * 1. division/branch, division/branch/num
 * 2. division/branch/sector, division/branch/sector/num
 * 3. division/branch/sector/unit, division/branch/unit/num
 */

/**
* View staffs by hierarchies division / branch
*/

Route::get(array(
	'division/(:any)/(:any)',
	'division/(:any)/(:any)/(:num)'),
	function(
	$division_slug = '',
	$branch_slug = '',
	$offset = 1) use($staffs_page) {

	$hierarchies = $breadcrumbs = array();

	if( ! $division = Division::slug($division_slug )) {
		return Response::create(new Template('404'), 404);
	}

	if (isset($division)) $hierarchies['division'] = $division;

	if( !empty($branch_slug) && ! $branch = Branch::slug($branch_slug )) {
		return Response::create(new Template('404'), 404);
	}

	if (isset($branch)) $hierarchies['branch'] = $branch;

	// get public listings
	list($total, $staffs) = Staff::listing($offset, $per_page = Config::meta('staffs_per_page'), $hierarchies);

	// get branch under this branch
	list($count, $sectors) = Sector::listing($branch->id, $offset, $per_page = Config::meta('staffs_per_page'));

	// setup breadcrumb
	foreach ($hierarchies as $key => $value) {
		$breadcrumbs[$key] = $value->id;
	}

	if($hierarchy = Hierarchy::search($breadcrumbs)) {
		$breadcrumb = breadcrumb_hierarchy($hierarchy->id);

		$bc = array();
		foreach ($breadcrumb as $key => $value) {
			if (in_array($key, array_keys($breadcrumbs))) {
				$bc[$key] = $value;
			}
		}
		Registry::set('breadcrumb', $bc);
	}

	// get the last page
	$max_page = ($total > $per_page) ? ceil($total / $per_page) : 1;

	// stop users browsing to non existing ranges
	if(($offset > $max_page) || ($offset < 1)) {
		return Response::create(new Template('404'), 404);
	}

	$staffs = new Items($staffs);
	$sectors = new Items($sectors);

	Registry::set('staffs', $staffs);
	Registry::set('sectors', $sectors);
	Registry::set('total_staffs', $total);
	Registry::set('page', $staffs_page);
	Registry::set('page_offset', $offset);
	Registry::set('branch_slug', $branch->slug);
	Registry::set('staff_division', $division);
	Registry::set('division_slug', $division_slug);

	return new Template('staffs-branch');
});

/**
* View staffs by hierarchies division / branch
*/

Route::get(array(
	'division/(:any)/(:any)/(:any)',
	'division/(:any)/(:any)/(:any)/(:num)'),
	function(
	$division_slug = '',
	$branch_slug = '',
	$sector_slug = '',
	$offset = 1) use($staffs_page) {

	$hierarchies = $breadcrumbs = array();

	if( ! $division = Division::slug($division_slug )) {
		return Response::create(new Template('404'), 404);
	}

	if (isset($division)) $hierarchies['division'] = $division;

	if( !empty($branch_slug) && ! $branch = Branch::slug($branch_slug )) {
		return Response::create(new Template('404'), 404);
	}

	if (isset($branch)) $hierarchies['branch'] = $branch;

	if( !empty($sector_slug) && ! $sector = Sector::slug($sector_slug )) {
		return Response::create(new Template('404'), 404);
	}

	if (isset($sector)) $hierarchies['sector'] = $sector;

	// get public listings
	list($total, $staffs) = Staff::listing($offset, $per_page = Config::meta('staffs_per_page'), $hierarchies);

	// get branch under this branch
	list($count, $units) = Unit::listing($sector->id, $offset, $per_page = Config::meta('staffs_per_page'));

	// setup breadcrumb
	foreach ($hierarchies as $key => $value) {
		$breadcrumbs[$key] = $value->id;
	}

	if($hierarchy = Hierarchy::search($breadcrumbs)) {
		$breadcrumb = breadcrumb_hierarchy($hierarchy->id);

		$bc = array();
		foreach ($breadcrumb as $key => $value) {
			if (in_array($key, array_keys($breadcrumbs))) {
				$bc[$key] = $value;
			}
		}
		Registry::set('breadcrumb', $bc);
	}

	// get the last page
	$max_page = ($total > $per_page) ? ceil($total / $per_page) : 1;

	// stop users browsing to non existing ranges
	if(($offset > $max_page) || ($offset < 1)) {
		return Response::create(new Template('404'), 404);
	}

	$staffs = new Items($staffs);
	$units = new Items($units);

	Registry::set('staffs', $staffs);
	Registry::set('units', $units);
	Registry::set('total_staffs', $total);
	Registry::set('page', $staffs_page);
	Registry::set('page_offset', $offset);
	Registry::set('branch_slug', $branch->slug);
	Registry::set('sector_slug', $sector->slug);
	Registry::set('staff_division', $division);
	Registry::set('division_slug', $division_slug);

	return new Template('staffs-sector');
});

/**
* View staffs by hierarchies division / branch
*/

Route::get(array(
	'division/(:any)/(:any)/(:any)/(:any)',
	'division/(:any)/(:any)/(:any)/(:any)/(:num)'),
	function(
	$division_slug = '',
	$branch_slug = '',
	$sector_slug = '',
	$unit_slug = '',
	$offset = 1) use($staffs_page) {

	$hierarchies = $breadcrumbs = array();

	if( ! $division = Division::slug($division_slug )) {
		return Response::create(new Template('404'), 404);
	}
	if (isset($division)) $hierarchies['division'] = $division;

	if( !empty($branch_slug) && ! $branch = Branch::slug($branch_slug )) {
		return Response::create(new Template('404'), 404);
	}
	if (isset($branch)) $hierarchies['branch'] = $branch;

	if( !empty($sector_slug) && ! $sector = Sector::slug($sector_slug )) {
		return Response::create(new Template('404'), 404);
	}
	if (isset($sector)) $hierarchies['sector'] = $sector;

	if( !empty($unit_slug) && ! $unit = Unit::slug($unit_slug )) {
		return Response::create(new Template('404'), 404);
	}
	if (isset($unit)) $hierarchies['unit'] = $unit;

	// get public listings
	list($total, $staffs) = Staff::listing($offset, $per_page = Config::meta('staffs_per_page'), $hierarchies);

	// setup breadcrumb
	foreach ($hierarchies as $key => $value) {
		$breadcrumbs[$key] = $value->id;
	}

	if($hierarchy = Hierarchy::search($breadcrumbs)) {
		$breadcrumb = breadcrumb_hierarchy($hierarchy->id);

		$bc = array();
		foreach ($breadcrumb as $key => $value) {
			if (in_array($key, array_keys($breadcrumbs))) {
				$bc[$key] = $value;
			}
		}
		Registry::set('breadcrumb', $bc);
	}

	// get the last page
	$max_page = ($total > $per_page) ? ceil($total / $per_page) : 1;

	// stop users browsing to non existing ranges
	if(($offset > $max_page) || ($offset < 1)) {
		return Response::create(new Template('404'), 404);
	}

	$staffs = new Items($staffs);

	Registry::set('staffs', $staffs);
	Registry::set('total_staffs', $total);
	Registry::set('page', $staffs_page);
	Registry::set('page_offset', $offset);
	Registry::set('branch_slug', $branch->slug);
	Registry::set('staff_division', $division);
	Registry::set('division_slug', $division_slug);

	return new Template('staffs-unit');
});

/**
* Redirect by staff ID
*/
Route::get('(:num)', function($id) use($staffs_page) {
	if( (! $staff = Staff::id($id)) || $staff->status == 'inactive') {
		return Response::create(new Template('404'), 404);
	}

	return Response::redirect($staff->slug);
});

/**
* View staff
*/


/**
 * View pages
 */

Route::get('(:all)', function($uri) use($staffs_page) {

	// find if slug is staff
	if( $staff = Staff::slug(basename($uri)) ) {

		if ($staff->status == 'inactive') {
			return Response::create(new Template('404'), 404);
		}

		if($breadcrumbs = staff_hierarchy($staff->id, true)) {
			Registry::set('breadcrumb', $breadcrumbs);
		}

		Staff::update($staff->id, array('view' => $staff->view +1));

		Stats::log($staff->id, 'staff');

		Registry::set('page', $staffs_page);
		Registry::set('staff', $staff);
		Registry::set('division', Division::find($staff->division));

		return new Template('staff');
	}

	// Find for page slug
	if ( $page = Page::slug(basename($uri)) ) {
		if($page->redirect) {
			return Response::redirect($page->redirect);
		}
		Registry::set('page', $page);

		return new Template('page');
	}

	return Response::create(new Template('404'), 404);

});


/**
* Rss feed
*/
Route::get(array('rss', 'feeds/rss'), function() {

	$rss = new Rss(Config::meta('sitename'), Config::meta('description'), Uri::full(''), Config::app('language'));

	$query = Staff::where('status', '=', 'active')->sort(Base::table('staffs.grade'), 'desc')->take(25);

	foreach($query->get() as $staff) {
		$rss->item(
		$staff->title,
		Uri::full(Registry::get('staffs_page')->slug . '/' . $staff->slug),
		$staff->description,
		$staff->created
		);
	}

	$xml = $rss->output();

	return Response::create($xml, 200, array('content-type' => 'application/xml'));
});

/**
* Json feed
*/
Route::get('feeds/json', function() {
	$json = Json::encode(array(
	'meta' => Config::get('meta'),
	'staffs' => Staff::where('status', '=', 'active')->sort(Base::table('staffs.created'), 'desc')->take(25)->get()
	));

	return Response::create($json, 200, array('content-type' => 'application/json'));
});

/**
* Keyboard Shortcut Helper
*/
Route::get(array('help/keys', 'help/hotkey'), function() {
	return new Template('help');
});

/**
* Special page redirect
*/
Route::get('division', function() {
	return Response::redirect('divisions');
});

Route::get('category', function() {
	return Response::redirect('categories');
});

Route::get('test', function() {

	$page = new Page;
	$page->id = 0;
	$page->title = 'Test';
	$page->slug = 'test';

	Registry::set('page', $page);
	Csrf::reset();
	return mt_rand(0, 100);
});

/*
 * 404 not found
 */
Route::not_found(function() {
	return Response::create(new Template('404'), 404);
});
