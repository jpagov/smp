<?php


/**
* Search
*/
Route::get(array('search', 'search/(:num)'), function($offset = 1) {
	// mock search page
	$page = new Page;
	$page->id = 0;
	$page->title = 'Search';
	$page->slug = 'search';

	$field = array('display_name');
	$term = '';
	$filter = array();
	$staffs = array();
	$total = 0;


	$input = array_map(function ($var) {
		return (empty($var)) ? null : filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
	}, Input::get(array('term')));

	$searchin = array_filter(filter_var_array(Input::get(array('in')), array(
			'in' => array(
				'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
				'flags'  => FILTER_FORCE_ARRAY,
			   )
			)
		)
	);

	$searchin['in'] = (empty(array_filter($searchin['in']))) ? $field : $searchin['in'];


	$division = array_filter(filter_var_array(Input::get(array('division')), array(
			'division' => array(
				'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
				'flags'  => FILTER_FORCE_ARRAY,
			   )
			)
		)
	);

	$division['division'] = (empty(array_filter($division['division']))) ? null : $division['division'];

	$search = array_merge($input, $division, $searchin);

	if ($search['in']) {
		$field = $search['in'];
		Registry::set('search_in', $search['in']);
	}

	if ($search['division']) {
		$filter['division'] = $search['division'];
		Registry::set('search_division', $search['division']);
	}

	if ($search['term']) {
		# code...


		// get search term
		//$term = filter_var($term, FILTER_SANITIZE_STRING);
		//$term = htmlspecialchars($term);
		$term = $search['term'];

		//dd($term);

		Session::put($term, $term);
		//$term = Session::get($slug); //this was for POST only searches

		// revert double-dashes back to spaces
		$term = str_replace('+', ' ', $term);

		$log = Search::create(array(
			'search' => $term,
			'created' => Date::mysql('now')
			));

		Stats::log($log->id, 'search');

		if($offset > 0) {
			list($total, $staffs) = Staff::search($term, $offset, Config::meta('staffs_per_page'), false, $filter, $field);
		} else {
			return Response::create(new Template('404'), 404);
		}

		$divisions = Division::listing();

		// search templating vars
		Registry::set('page', $page);
		Registry::set('page_offset', $offset);
		Registry::set('search_term', $term);
		Registry::set('search_in_all', array('display_name', 'slug', 'email', 'telephone', 'description'));
		Registry::set('search_results', new Items($staffs));
		Registry::set('total_staffs', $total);
		Registry::set('divisions', $divisions);

		//Session::put('search_division', $search['division']);

		return new Template('search');
	}

	Registry::set('page', $page);

	return new Template('search-landing');

});

Route::post('search', function() {

	/* advanced
	$input = filter_var_array(Input::get(array('term', 'division', 'branch')), array(
	'name' => FILTER_SANITIZE_STRING,
	'email' => FILTER_SANITIZE_EMAIL,
	'text' => FILTER_SANITIZE_SPECIAL_CHARS
	));
	*/
$input = filter_var_array(Input::get(array('term')), array(
	'term' => FILTER_SANITIZE_SPECIAL_CHARS
	));


$validator = new Validator($input);

$validator->check('term')->is_max(3, __('site.search_missing', 3));

if($errors = $validator->errors()) {
	Input::flash();

	Notify::warning($errors);
	return Response::redirect('search/');
}

$term = $input['term'];

	// replace spaces with double-dash to pass through url
$term = str_replace(' ', '+', $term);

Session::put($term, $term);

return Response::redirect('search/' . $term);
});

