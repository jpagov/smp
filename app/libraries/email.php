<?php

class Email extends PHPMailer {

	// name, email, message, staff, ip, created, to, subject
    public function __construct($email = array(), $param = array(
			'SMTPDebug' => 0,
			'SMTPAuth' => false,
    	)) {

        parent::__construct();

        foreach ($param as $key => $option) {
        	$this->$key = $option;
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

        $this->setFrom(Config::mail('from.address'), Config::mail('from.name'));

        if (array_key_exists('email', $email)) {

       		$this->addReplyTo($email['email'], array_key_exists('name', $email) ? $email['name'] : Config::meta('sitename'));
       	}

       	$this->addAddress($email['to'], Config::meta('sitename'));

       	$message = Braces::compile(PATH . 'content/email.html', array(
       		'title' => $email['subject'] ?: __('site.message_subject'),
       		'hi' => __('email.hi'),
       		'abstract' => __('email.abstract'),
       		'detail' => __('email.detail'),
       		'sender_name' => __('email.sender_name'),
       		'sender_name_value' => $email['name'] ?: __('email.notavailable'),
       		'sender_email' => __('email.sender_email'),
			'sender_email_value' => $email['email'] ?: __('email.notavailable'),
			'sender_date' => __('email.sender_date'),
			'sender_date_value' => $email['created'] ? Date::format('now', 'd-m-Y H:i:s') : gmdate('d-m-Y H:i:s'),
			'message' => __('email.message'),
			'message_value' => $email['message'],
			'thanks' => __('email.thanks'),
			'footer' => __('site.title'),

		));

        $this->Subject = $email['subject'];
        $this->msgHTML($message);
        $this->AltBody = $email['message'];
    }

}
