<?php

class Email extends PHPMailer
{

    // name, email, message, staff, ip, created, to, subject
    public function __construct($email = [], $param = [
        'SMTPDebug' => 0,
        'SMTPAuth' => false,
        'isHTML' => true,
        'CharSet' => 'utf-8',
        'Encoding' => 'base64',
        'XMailer' => ' ',
        ])
    {
        parent::__construct();

        foreach ($param as $key => $option) {
            $this->$key = $option;
        }

        if (Config::mail('pretend')) {
            $this->SMTPDebug = 2;
            $this->Debugoutput = function ($str, $level) {
                $debug = [
                    'level' => $level,
                    'message' => $str
                ];
                file_put_contents(STORAGE . 'mail.log', json_encode($debug), FILE_APPEND | LOCK_EX);
            };
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
            foreach ($email['from'] as $from) {
                foreach ($from as $address => $name) {
                    if (empty($name)) {
                        $this->addReplyTo($address);
                    } else {
                        $this->addReplyTo($address, $name);
                    }
                }
            }
        }

        if (array_key_exists('to', $email)) {
        	if (is_array($email['to'])) {
        		foreach ($email['to'] as $to) {
	                foreach ($to as $address => $name) {
	                    if (empty($name)) {
	                        $this->addAddress($address);
	                    } else {
	                        $this->addAddress($address, $name);
	                    }
	                }
	            }
        	} else {
        		$this->addAddress($email['to']);
        	}
        }

        // add carbon copy
        if (array_key_exists('cc', $email)) {
            foreach ($email['cc'] as $cc) {
                foreach ($cc as $address => $name) {
                    if (empty($name)) {
                        $this->addCC($address);
                    } else {
                        $this->addCC($address, $name);
                    }
                }
            }
        }

        $this->Subject = $email['subject'];
        $this->msgHTML($email['message']);
        $this->AltBody = $email['message'];
    }
}
