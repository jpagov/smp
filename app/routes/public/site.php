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

/**
* Editor pretend as user
*/
Route::get('pretend', function() {

	$pretend = filter_var($_SERVER['QUERY_STRING'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

	if ($pretend) {
		Session::put('pretend', $pretend);

		Input::flash();
		Notify::success(__('global.pretended'));

		return Response::redirect('/');
	} else {
		Session::erase('pretend');

		Input::flash();
		Notify::success(__('global.pretend_canceled'));

		return Response::redirect('admin');
	}


});

Route::get('category/(:any)', function($slug) {

	if (!$category = Category::slug($slug)) {
		return Response::create(new Template('404'), 404);
	}

	Category::update($category->id, array('view' => $category->view +1));

	Stats::log($category->id, 'category');

	return Response::redirect($category->redirect);
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

	Division::update($division->id, array('view' => $division->view +1));

	Stats::log($division->id, 'division');

	$hierarchies = array();
	$hierarchies['division'] = $division;

	// get public listings
	list($total, $staffs) = Staff::listing($offset, $per_page = Config::meta('staffs_per_page'), $hierarchies);


	$vars['staffs'] = $staffs;
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

	return new Template('staffs', $vars);
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
		Registry::set('pagination', $bc['branch']);
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
		Registry::set('pagination', $bc['sector']);
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
		Registry::set($key, $value);
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
		Registry::set('pagination', $bc['unit']);
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

	$vars['ajax'] =  false;

	if ((substr($uri, -4) == 'ajax')) {
		$vars['ajax'] =  true;
		$uri = str_replace('/ajax', '', $uri);
	}

	// find if slug in staff table
	if( $staff = Staff::slug(basename($uri)) ) {

		if ($staff->status == 'inactive') {
			return Response::create(new Template('404'), 404);
		}

		if($breadcrumbs = staff_hierarchy($staff->id, true, true)) {
			Registry::set('breadcrumb', $breadcrumbs);
		}

		Staff::update($staff->id, array('view' => $staff->view +1));

		Stats::log($staff->id, 'staff');

		Registry::set('page', $staffs_page);
		Registry::set('staff', $staff);
		Registry::set('division', Division::find($staff->division));

		return new Template('staff', $vars);
	}

	// find if slug in revision table
	if( $staff = Revision::slug(basename($uri)) ) {

		// found the old slug, redirect using staff id
		return Response::redirect($staff->staff_id);
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



	dd(get_ip_address(), is_public('202.21.0.1'));
});

/*
 * 404 not found
 */
Route::not_found(function() {
	return Response::create(new Template('404'), 404);
});
