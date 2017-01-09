<?php

return array(
	'driver' => 'database',
	'cookie' => 'smpapp',
	'table' => 'ed_sessions',
	'lifetime' => 86400,
	//604800 //one week
	'expire_on_close' => false,
	'path' => '/smp',
	'domain' => '',
	'secure' => true
);
