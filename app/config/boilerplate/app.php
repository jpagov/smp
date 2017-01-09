<?php

return array(
	'url' => '/smp',
	'index' => '',
	'timezone' => 'Asia/Kuala_Lumpur',
	'key' => 'APP_UNIQUE_KEY', // Pilih kat sini : https://api.wordpress.org/secret-key/1.1/salt/
	'language' => 'ms_MY',
	'encoding' => 'UTF-8',
	'hierarchy' => array(
		'division' => 1,
		'branch' => 2,
		'sector' => 3,
		'unit' => 4
	),
	'prefix' => 'smp',
	'recaptcha' => true,
	'recaptcha_key' => 'GOOGLE_RECAPTHA_KEY',
	'recaptcha_secret' => 'GOOGLE_RECAPTHA_SECRET',
);
