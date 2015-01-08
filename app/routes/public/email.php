<?php
/**
* Post a comment
*/
//Route::post('test/email', array('before' => 'csrf', 'main' => function() {
//	s
//}));

Route::get('test/email', function() {

	$subject = __('site.message_subject');
	$mail = new Email('hariadi@jpa.gov.my', $subject, 'Hai', 2, array(
		'Debugoutput' => 'html',
		'SMTPDebug' => 2
	));

	if(!$mail->send()) {
		Notify::warning(__('users.msg_not_send', $mail->ErrorInfo));
	}

	return $mail;
});
