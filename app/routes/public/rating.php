<?php
/**
* Post a comment
*/
Route::post('(:any)', function() {

	// delete existing rating using cookie
	Cookie::erase(Config::app('prefix') . '_rating');

	$input = filter_var_array(Input::get(array('score', 'staff')), array(
		'score' => array(
			'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
			'flags' => FILTER_FLAG_ALLOW_FRACTION
		),
		'staff' => FILTER_SANITIZE_NUMBER_INT,
	));

	if( ! $staff = Staff::id($input['staff']) ) {
		return;
	}

	if ($session = Session::get('rating')) {

		// lets check if staff id already in rating list
		if (in_array($staff->id, $session)) {

			$result = array(
				'status' => false,
				'msg_title' => _e('site.notice'),
				'msg' => _e('site.rating_warning')
			);

			$json = Json::encode($result);

			return Response::create($json, 200, array(
					'X-Frame-Options' => 'SAMEORIGIN',
					'content-type' => 'application/json'
				));
		}
	}

	if (array_filter($input)) {

		$input['created'] = Date::mysql('now');
		$rating = Rating::create($input);

		$score = [1 => 'one',  2 => 'two',  3 => 'three', 4 =>'four', 5 =>'five'];

		$ratings = Rating::where('staff', '=', $staff->id);

		$total = ($ratings->count()) ?: 0;

		$percent = (Rating::where('staff', '=', $staff->id)->where('score', '=', $rating->score)->count() / $total)*100;


		$result = array(
			'id' => (int) $rating->id,
			'score' => (double) $rating->score,
			'update' => 'bar-' . $score[$rating->score],
			'average' => round((array_sum(array_map(function($vote) {
										return $vote->score;
									}, $ratings->get())) / $total)*2) / 2,
			'total' => (int) $total,
			'percent' => $percent,
			'status' => true,
			'msg_title' => _e('site.success'),
			'msg' => _e('site.rating_success')
		);

		if (isset($session)) {
			$session[] = $staff->id;
			Session::put('rating', $session);
		} else {
			Session::put('rating', [$staff->id]);
		}

		$json = Json::encode($result);

		return Response::create($json, 200, array(
			'X-Frame-Options' => 'SAMEORIGIN',
			'content-type' => 'application/json'
			));
	}

});
