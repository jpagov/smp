<?php

Route::collection(array('before' => 'auth'), function() {

	/*
		List Transfers
	*/
	Route::get(array('admin/transfers', 'admin/transfers/(:num)'), function($page = 1) {

		$vars['editor'] = Auth::user();
		$vars['messages'] = Notify::read();
		$vars['transfers'] = Transfer::paginate($page);

		return View::create('transfers/index', $vars)
			->partial('header', 'partials/header')
			->partial('search', 'partials/search', $vars)
			->partial('footer', 'partials/footer');
	});

	/*
        View transfer
    */
    Route::get('admin/transfers/view/(:num)', function ($id) {
    	$editor = Auth::user();
    	$vars['messages'] = Notify::read();

    	$vars['transfer'] = Transfer::findBy($id);

    	return View::create('transfers/view', $vars)
            ->partial('header', 'partials/header')
            ->partial('footer', 'partials/footer');
    });

	/*
        Transfer staff
    */
    Route::get('admin/transfers/(:num)/(:num)', function ($staff, $division_to) {
        $user = Auth::user();

        $staff = filter_var($staff, FILTER_SANITIZE_NUMBER_INT);
        $division_to = filter_var($division_to, FILTER_SANITIZE_NUMBER_INT);

        $editors = Staff::editors($division_to);
        $staff = Staff::find($staff);

        if ($staff->status == 'transfer') {

        	$transfer = Transfer::findBy($staff->id, 'staff', true);

        	Notify::warning(__('transfers.already_transfer'));
        	return Response::redirect('admin/transfers/view/'. $transfer->id);
        }

        $input = [
            'staff_id' => $staff->id,
            'transfer_from' => $staff->division,
            'transfer_to' => $division_to,
            'transfer_by' => $user->id,
        ];

        // insert to transfer table
        if ($transfer = Transfer::create($input)) {

        	$transfer = Transfer::findBy($transfer->id);

            // find editors for division we want to transfer
            $editors = Staff::editors($transfer->division_to_id);

            // find editors for division transfer from
            $cces = Staff::editors($transfer->division_from_id);

            // add related editors to recipient
            $divisions_to = [];
            foreach ($editors as $editor) {
            	$divisions_to[] = [$editor->email => $editor->display_name];
            }

            // add related editors to cc
            $divisions_from = [];
            foreach ($cces as $cc) {
            	if ($user->email == $cc->email) {
            		continue;
            	}
            	$divisions_from[] = [$cc->email => $cc->display_name];
            }

            // editor doing transfering
            $from[] = [$user->email => $user->display_name];

            $emailer = [
                'to' => $divisions_to,
                'from' => $from,
                'cc' => $divisions_from,
                'subject' => __('email.transfer_subject'),
                'message' => Braces::compile(PATH . 'content/transfer.html', [
                    'title' => __('email.transfer_subject'),
                    'hi' => __('email.hi'),
                    'staff' => __('email.transfer_staff', $staff->display_name),
                    'transfered_at' => __('email.transfer_at', Date::format('now')),
                    'message' => __('email.transfer_message'),
                    'details' => __('email.transfer_details'),
                    'url' => Uri::full('admin/transfers/'. $transfer->id),
                    'button_text' => __('email.transfer_button'),
                    'thanks' => __('email.thanks'),
                    'signature' => __('email.signature', __('site.title')),
                    'footer_link' => Uri::full(''),
                    'footer' => __('site.title'),
                ])
            ];

            $mail = new Email($emailer);

            if (!$mail->send()) {
                Notify::warning(__('users.msg_not_send', $mail->ErrorInfo));
            }
        }

        Notify::success(__('transfers.sent'));

        // redirect to staffs index
        return Response::redirect('admin/staffs');
    });

    /*
        Confirm transfer
    */
    Route::get('admin/transfers/confirm/(:num)', function ($id) {

    	$editor = Auth::user();

    	if (!$transfer = Transfer::findBy($id)) {
    		Notify::warning(__('transfers.not_found'));
    		return Response::redirect('admin/transfers');
    	}

    	if (!$transfer->confirmed_at) {
    		Notify::warning(__('transfers.already_confirmed'));
    		return Response::redirect('admin/transfers');
    	}

    	if (!in_array($transfer->division_to_id, $editor->roles)) {
    		Notify::warning(__('transfers.dont_have_role'));
    		return Response::redirect('admin/transfers');
    	}

    	$transfer->update($id, [
    		'confirmed_at' => Date::mysql('now'),
    		'confirmed_by' => $editor->id,
    		'status' => 'confirm'
    	]);

    	Notify::success(__('transfers.confirm_success', $transfer->staff));

    	// send email to related editors
    	if (Config::meta('custom_transfer_email', 0)) {
    		# code...
    	}

    	return Response::redirect('admin/transfers');
    });

    /*
        Cancel transfer
    */
    Route::get('admin/transfers/cancel/(:num)', function ($id) {
    	$editor = Auth::user();

    	if (!$transfer = Transfer::findBy($id)) {
    		Notify::warning(__('transfers.not_found'));
    		return Response::redirect('admin/transfers');
    	}

    	$vars['transfer'] = $transfer;
    	Transfer::where('id', '=', $id)->delete();

    	Notify::success(__('transfers.deleted', $vars['transfer']->staff));

    	return Response::redirect('admin/transfers');
    });

});
