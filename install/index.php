<?php

define('DS', DIRECTORY_SEPARATOR);
define('ENV', getenv('APP_ENV'));
define('VERSION', '1.0');

define('PATH', dirname(dirname(__FILE__)) . DS);
define('APP', PATH . 'install' . DS);
define('SYS', PATH . 'system' . DS);
define('EXT', '.php');

require SYS . 'start' . EXT;
