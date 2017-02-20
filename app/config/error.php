<?php

return array(
	'log' => true,
	'report' => true,
	'logger' => function($exception) {
		//file_put_contents('error.log', date('c') . ' ---> ' . $exception . PHP_EOL, FILE_APPEND);
	}
);
