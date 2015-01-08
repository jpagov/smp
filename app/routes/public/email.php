<?php
/**
* Post a comment
*/
//Route::post('test/email', array('before' => 'csrf', 'main' => function() {
//	s
//}));

Route::get('test/email', function() {

	$subject = __('site.message_subject');

	$email = [
		'nama' => 'Percubaan Emel',
		'email' => 'hariadi@jpa.gov.my',
		'subject' => 'Percubaan SMP',
		'message' => 'Hai disana, disini sedang mencuba. ok bai',
		'staff' => 487,
		'ip' => '127.0.0.1',
		'created' => Date::mysql('now'),
		'to' => 'hariadi@jpa.gov.my',
	];
	$mail = new Email($email, array(
		'Debugoutput' => 'html',
		'SMTPDebug' => 2
	));

	if(!$mail->send()) {
		Notify::warning(__('users.msg_not_send', $mail->ErrorInfo));
	}

	return $mail;
});
