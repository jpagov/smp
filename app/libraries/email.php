<?php

class Email extends PHPMailer {

	// name, email, message, staff, ip, created, to, subject
	public function __construct($email = array(), $param = array('SMTPDebug' => 0,'SMTPAuth' => false)) {

		parent::__construct();

		foreach ($param as $key => $option) {
			$this->$key = $option;
		}

		if (Config::mail('pretend')) {
			$mail->SMTPDebug = 2;
			$mail->Debugoutput = 'html';
		}

		if (Config::mail('driver') == 'smtp') {
			$this->isSMTP();
			$this->Host = Config::mail('host');
			$this->Port = Config::mail('port');
		}

		if (Config::mail('username') && Config::mail('password')) {
			$this->SMTPAuth = true;
			$this->Username = Config::mail('username');
			$this->Password = Config::mail('password');
			$this->SMTPSecure = Config::mail('encryption');
		}

		$this->From = Config::mail('from.address');
		$this->FromName = Config::mail('from.name');

		if (array_key_exists('from', $email)) {

			$this->addReplyTo($email['from'], array_key_exists('from_name', $email) ? $email['from_name'] : Config::meta('sitename'));
		}

		$this->addAddress($email['to'], array_key_exists('to_name', $email) ? $email['to_name'] : Config::meta('sitename'));


		$this->Subject = $email['subject'];
		$this->msgHTML($email['message']);
		$this->AltBody = $email['message'];
	}

}
