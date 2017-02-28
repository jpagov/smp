<?php


/**
* Search
*/
Route::get(array('search', 'search/(:num)'), function($offset = 1) {
	// mock search page
	$page = new Page;
	$page->id = 0;
	$page->title = __('site.search');
	$page->slug = 'search';

	$field = array('display_name', 'slug', 'description');
	$term = '';
	$filter = array();
	$staffs = array();
	$total = 0;
	$aliases = array(
		'bahagian' => 'division',
		'cawangan' => 'branch',
		'sektor' => 'sector',
		//'unit' => 'unit',
	);

	$term = array_map(function ($var) {
		return (empty($var)) ? null : filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
	}, Input::get(array('term')));

	$input = array_filter(filter_var_array(Input::get(

		array(
			'division',
			'branch',
			'sector',
			'unit',
			'in'
		)),

		array(
			'division' => array(
				'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
				'flags'  => FILTER_FORCE_ARRAY,
			),
			'branch' => array(
				'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
				'flags'  => FILTER_FORCE_ARRAY,
			),
			'sector' => array(
				'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
				'flags'  => FILTER_FORCE_ARRAY,
			),
			'unit' => array(
				'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
				'flags'  => FILTER_FORCE_ARRAY,
			),
			'in' => array(
				'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
				'flags'  => FILTER_FORCE_ARRAY,
			)
		)
	));

	$term = str_replace('\\', '', $term);

	//$search = new Term($term['term']);
	$cari = new Cari($term['term']);

	$input = array_merge($input, $cari->result());

	// clean the input array
	foreach ($input as $key => $value) {
		if (is_array($value)) {
			if (empty(array_filter($value))) {
				unset($input[$key]);
			}

		}
	}

	unset($term);

	$term['term'] = $cari->term();

	// register to session
	if (array_key_exists('in', $input)) {


		$input['in'] = (empty(array_filter($input['in']))) ? $field : $input['in'];
		$input['in'] = array_merge($input['in'], $field);

		$field = $input['in'];
		Registry::set('search_in', $input['in']);
	}

	// rename key aliases
	foreach ($aliases as $key => $value) {
		if ($key == $value) continue;
		if (array_key_exists($key, $input)) {
			$input[$value] = $input[$key];
			unset($input[$key]);
		}
	}

	foreach (array('division', 'branch', 'sector', 'unit') as $item) {
		if (array_key_exists($item, $input)) {
			$filter[$item] = $input[$item];
			Registry::set('search_' . $item, $input[$item]);
		}
	}

	if (!empty(array_filter($input)) && isset($input['term'])) {

		$term = $input['term'];

		//dd($term);

		//Session::put($term, $term);
		//$term = Session::get($slug); //this was for POST only searches

		// revert plus back to spaces
		$term = str_replace('+', ' ', $term);

		if ($cari->input()) {

			$log = Search::create([
				'search' => $cari->input(),
				'created' => Date::mysql('now')
			]);

			Searchr::search($cari->input());

			Stats::log($log->id, 'search');
		}



		if($offset > 0) {
			list($total, $staffs) = Staff::search($term, $offset, Config::meta('staffs_per_page'), false, $filter, $field);
		} else {
			return Response::create(new Template('404'), 404);
		}

		$divisions = Division::listing();

		// search templating vars
		Registry::set('page', $page);
		Registry::set('page_offset', $offset);
		Registry::set('search_term', $cari->input());
		Registry::set('search_info', ($term) ?: $cari->input());
		Registry::set('search_in_all', array(
			'display_name', 'email', 'telephone', 'description', 'slug')
		);
		Registry::set('search_results', new Items($staffs));
		Registry::set('total_staffs', $total);
		Registry::set('divisions', $divisions);

		//Session::put('search_division', $input['division']);

		return new Template('search');
	}

	Registry::set('page', $page);

	return new Template('search');

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

