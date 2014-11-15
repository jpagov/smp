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

	$term = array_map(function ($var) {
		return (empty($var)) ? null : filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
	}, Input::get(array('term')));

	$search = new Term($term['term']);

	$input = $search->search();

	unset($term);

	$term['term'] = $search->term();

	$searchin = array_filter(filter_var_array(Input::get(array('in')), array(
			'in' => array(
				'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
				'flags'  => FILTER_FORCE_ARRAY,
			   )
			)
		)
	);

	$searchin['in'] = (empty(array_filter($searchin['in']))) ? $field : $searchin['in'];

	$searchin['in']  = array_unique(array_merge($searchin['in'], $search->get('in')));

	$division = array_filter(filter_var_array(Input::get(array('division')), array(
			'division' => array(
				'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
				'flags'  => FILTER_FORCE_ARRAY,
			   )
			)
		)
	);

	$division['division'] = array_map(function($var) {
		$divid = null;
		if ($div = Division::slug($var)) {
			$divid = $div->id;
		}

		return ctype_digit($var) ? $var : $divid;
	}, $division['division']);

	$division['division'] = (empty(array_filter($division['division']))) ? array() : $division['division'];

	$division['division']  = array_unique(array_merge($division['division'], array_map(function($var) {
		return ctype_digit($var) ? $var : Division::slug($var)->id;
	}, $search->get('division'))));

	unset($search);

	$search = array_merge($term, $division, $searchin);

	if ($search['in']) {
		$field = $search['in'];
		Registry::set('search_in', $search['in']);
	}

	if ($search['division']) {
		$filter['division'] = $search['division'];
		Registry::set('search_division', $search['division']);
	}

	//dd($search);

	if ($search['term']) {

		$term = $search['term'];

		//dd($term);

		Session::put($term, $term);
		//$term = Session::get($slug); //this was for POST only searches

		// revert plus back to spaces
		$term = str_replace('+', ' ', $term);

		$log = Search::create(array(
			'search' => $input,
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
		Registry::set('search_term', $input);
		Registry::set('search_info', $term);
		Registry::set('search_in_all', array(
			'display_name', 'email', 'telephone', 'description', 'slug')
		);
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

