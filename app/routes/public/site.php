<?php

/**
 * Important pages
 */
$home_page = Registry::get('home_page');
$staffs_page = Registry::get('staffs_page');

/**
 * The Home page
 */
if($home_page->id != $staffs_page->id) {
	Route::get(array('/', $home_page->slug), function() use($home_page) {
    if($home_page->redirect) {
      return Response::redirect($home_page->redirect);
    }

		Registry::set('page', $home_page);

		return new Template('page');
	});
}

/**
 * Post listings page
 */
$routes = array($staffs_page->slug, $staffs_page->slug . '/(:num)');

if($home_page->id == $staffs_page->id) {
	array_unshift($routes, '/');
}

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
	if(($offset > $max_page) or ($offset < 1)) {
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
 * View staffs by hierarchies
 */
Route::get(array(
  'division/(:any)', 'division/(:any)/(:num)',
  'division/(:any)/(:any)', 'division/(:any)/(:any)/(:num)',
  'division/(:any)/(:any)/(:any)', 'division/(:any)/(:any)/(:any)/(:num)',
  'division/(:any)/(:any)/(:any)/(:any)', 'division/(:any)/(:any)/(:any)/(:any)/(:num)'),
function(
  $division_slug = '',
  $branch_slug = '',
  $sector_slug = '',
  $unit_slug = '',
  $offset = 1) use($staffs_page) {

  if( ! $division = Division::slug($division_slug )) {
      return Response::create(new Template('404'), 404);
	}

  if( !empty($branch_slug) and ! $branch = Division::slug($branch_slug )) {
      return Response::create(new Template('404'), 404);
  }

  if( !empty($sector_slug) and ! $sector = Division::slug($sector_slug )) {
      return Response::create(new Template('404'), 404);
  }

  if( !empty($unit_slug) and ! $unit = Division::slug($unit_slug )) {
      return Response::create(new Template('404'), 404);
  }

  $hierarchies = array(
    'division' => $division,
    'branch' => $branch,
    'sector' => $sector,
    'unit' => $unit
    );

	// get public listings
	list($total, $staffs) = Staff::listing($offset, $per_page = Config::meta('staffs_per_page'), $hierarchies);

	// get the last page
	$max_page = ($total > $per_page) ? ceil($total / $per_page) : 1;

	// stop users browsing to non existing ranges
	if(($offset > $max_page) or ($offset < 1)) {
		return Response::create(new Template('404'), 404);
	}

	$staffs = new Items($staffs);

	Registry::set('staffs', $staffs);
	Registry::set('total_staffs', $total);
	Registry::set('page', $staffs_page);
	Registry::set('page_offset', $offset);
	Registry::set('staff_division', $division);

	return new Template('staffs');
});

/**
 * Redirect by staff ID
 */
Route::get('(:num)', function($id) use($staffs_page) {
	if( ! $staff = Staff::id($id)) {
		return Response::create(new Template('404'), 404);
	}

	return Response::redirect($staffs_page->slug . '/' . $staff->data['slug']);
});

/**
 * View staff
 */
Route::get($staffs_page->slug . '/(:any)', function($slug) use($staffs_page) {
	if( ! $staff = Staff::slug($slug)) {
		return Response::create(new Template('404'), 404);
	}

	Registry::set('page', $staffs_page);
	Registry::set('staff', $staff);
	Registry::set('division', Division::find($staff->division));

	return new Template('staff');
});

/**
 * Post a comment
 */
Route::post($staffs_page->slug . '/(:any)', function($slug) use($staffs_page) {
	if( ! $staff = Staff::slug($slug) or ! $staff->comments) {
		return Response::create(new Template('404'), 404);
	}

	$input = filter_var_array(Input::get(array('name', 'email', 'text')), array(
		'name' => FILTER_SANITIZE_STRING,
		'email' => FILTER_SANITIZE_EMAIL,
		'text' => FILTER_SANITIZE_SPECIAL_CHARS
	));

	$validator = new Validator($input);

	$validator->check('email')
		->is_email(__('comments.email_missing'));

	$validator->check('text')
		->is_max(3, __('comments.text_missing'));

	if($errors = $validator->errors()) {
		Input::flash();

		Notify::error($errors);

		return Response::redirect($staffs_page->slug . '/' . $slug . '#comment');
	}

	$input['staff'] = Staff::slug($slug)->id;
	$input['date'] = Date::mysql('now');
	$input['status'] = Config::meta('auto_published_comments') ? 'approved' : 'pending';

	// remove bad tags
	$input['text'] = strip_tags($input['text'], '<a>,<b>,<blockquote>,<code>,<em>,<i>,<p>,<pre>');

	// check if the comment is possibly spam
	if($spam = Comment::spam($input)) {
		$input['status'] = 'spam';
	}

	$comment = Comment::create($input);

	Notify::success(__('comments.created'));

	// dont notify if we have marked as spam
	if( ! $spam and Config::meta('comment_notifications')) {
		$comment->notify();
	}

	return Response::redirect($staffs_page->slug . '/' . $slug . '#comment');
});

/**
 * Rss feed
 */
Route::get(array('rss', 'feeds/rss'), function() {
	$uri = 'http://' . $_SERVER['HTTP_HOST'];
	$rss = new Rss(Config::meta('sitename'), Config::meta('description'), $uri, Config::app('language'));

	$query = Staff::where('status', '=', 'published')->sort(Base::table('staffs.created'), 'desc');

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
		'staffs' => Staff::where('status', '=', 'active')->sort(Base::table('staffs.created'), 'desc')->get()
	));

	return Response::create($json, 200, array('content-type' => 'application/json'));
});

/**
 * Search
 */
Route::get(array('search', 'search/(:any)', 'search/(:any)/(:num)'), function($slug = '', $offset = 1) {
	// mock search page
	$page = new Page;
	$page->id = 0;
	$page->title = 'Search';
	$page->slug = 'search';

	// get search term
	$term = filter_var($slug, FILTER_SANITIZE_STRING);
	Session::put(slug($term), $term);
	//$term = Session::get($slug); //this was for POST only searches

	// revert double-dashes back to spaces
	$term = str_replace('--', ' ', $term);

	if($offset > 0) {
		list($total, $staffs) = Staff::search($term, $offset, Config::meta('staffs_per_page'));
	} else {
		return Response::create(new Template('404'), 404);
	}

	// search templating vars
	Registry::set('page', $page);
	Registry::set('page_offset', $offset);
	Registry::set('search_term', $term);
	Registry::set('search_results', new Items($staffs));
	Registry::set('total_staffs', $total);

	return new Template('search');
});

Route::post('search', function() {
	// search and save search ID
	$term = filter_var(Input::get('term', ''), FILTER_SANITIZE_STRING);

	// replace spaces with double-dash to pass through url
	$term = str_replace(' ', '--', $term);

	Session::put(slug($term), $term);

	return Response::redirect('search/' . slug($term));
});

/**
 * View pages
 */
Route::get('(:all)', function($uri) {
	if( ! $page = Page::slug($slug = basename($uri))) {
		return Response::create(new Template('404'), 404);
	}

	if($page->redirect) {
		return Response::redirect($page->redirect);
	}

	Registry::set('page', $page);

	return new Template('page');
});
