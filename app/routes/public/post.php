<?php
/**
* Post a comment
*/
Route::post('(:any)', array('before' => 'csrf', 'main' => function() {

	$input = filter_var_array(Input::get(array('type', 'score', 'staff')), array(
		'type' => FILTER_SANITIZE_SPECIAL_CHARS,
		'score' => array(
			'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
			'flags' => FILTER_FLAG_ALLOW_FRACTION
		),
		'staff' => FILTER_SANITIZE_NUMBER_INT,
	));

	if( ! $staff = Staff::id($input['staff']) ) {
		return;
	}

	$type = $input['type'] ?: 'rating';
	unset($input['type']);

	switch ($type) {
		case 'message':

			$message = filter_var_array(Input::get('contact'), array(
				'name' => FILTER_SANITIZE_SPECIAL_CHARS,
				'email' => FILTER_SANITIZE_EMAIL,
				'message' => FILTER_SANITIZE_SPECIAL_CHARS,
			));

			$url = Uri::secure(Uri::current());

			if (!$alreadynotrobot = Session::get('recaptcha')) {
				if (Config::app('recaptcha') && Input::get('g-recaptcha-response')) {

					$reCaptcha = new ReCaptcha(Config::app('recaptcha_secret'));
					$resp = $reCaptcha->verifyResponse(
						get_client_ip(),
						$_POST["g-recaptcha-response"]
					);

					if (!$resp->success) {
						Input::flash();
						Notify::warning(__('site.recaptcha_warning'));
						Session::put('modal', 'messageModal');

						return Response::redirect($url);
					} else {
						// save user preference so dont show recaptcha again
						Session::put('recaptcha', $resp->success);
					}

				} else {
					Input::flash();
					Notify::warning(__('site.recaptcha_warning'));
					Session::put('modal', 'messageModal');

					return Response::redirect($url);
				}
			}

			$validator = new Validator(
				array(
					///'email' => $message['email'],
					'message' => $message['message']
					)
				);

			//$validator->check('email')->is_email(__('users.email_missing'));

			$validator->check('message')
				->is_max(5, __('site.message_missing', 5));

			if($errors = $validator->errors()) {
				Input::flash();
				Notify::warning($errors);

				Session::put('errors', array_keys($errors));
				Session::put('modal', 'messageModal');

				return Response::redirect($url);
			}

			$message['staff'] = $staff->id;
			$message['ip'] = get_client_ip();
			$message['created'] = Date::mysql('now');

			$contact = Message::create($message);
			Notify::success(__('site.message_created'));

			// Send email to staff
			// TODO: also send copy to sender

			// Get staf email
			$subject = __('site.message_subject');
			$mail = new Email($staff->email, $subject, $contact->message, 2);

			if(!$mail->send()) {
				Notify::warning(__('users.msg_not_send', $mail->ErrorInfo));
			}

			return Response::redirect($url);

		default:

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
	}



}));
