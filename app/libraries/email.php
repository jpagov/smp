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



        /*
        if (is_array($email)) {
            foreach ($email as $address) {
                $this->addAddress($address);
            }
        } else {
            $this->addAddress($email);
        }
        */


        //$this->isHTML($html);

        $this->Subject = $email['subject'];
        $this->msgHTML($email['message']);
        $this->AltBody = $email['message'];
    }

}
