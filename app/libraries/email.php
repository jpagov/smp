<?php

class Email extends PHPMailer {

    public function __construct($email, $subject, $msg, $debug = 0, $html = false, $param = array()) {

        parent::__construct();

        if ($debug) {
            $this->SMTPDebug = $debug;
        }

        if (Config::mail('driver') == 'smtp') {
            $this->isSMTP();
            $this->Host = Config::mail('host');
            $this->Port = Config::mail('port');
        }

        foreach ($param as $key => $option) {
        	$this->$key = $option;
        }

        if (Config::mail('username') && Config::mail('password')) {
            $this->SMTPAuth = true;
            $this->Username = Config::mail('username');
            $this->Password = Config::mail('password');
            $this->SMTPSecure = Config::mail('encryption');
        }

        $this->From = Config::mail('from.address');
        $this->FromName = Config::mail('from.name');
        $this->addReplyTo(Config::mail('from.address'), Config::meta('sitename'));

        if (is_array($email)) {
            foreach ($email as $address) {
                $this->addAddress($address);
            }
        } else {
            $this->addAddress($email);
        }

        $this->isHTML($html);

        $this->Subject = $subject;
        $this->Body = $this->AltBody = $msg;
    }

}
