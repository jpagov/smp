<?php

define('DS', DIRECTORY_SEPARATOR);
define('ENV', getenv('APP_ENV'));
define('VERSION', '0.10.0');

define('PATH', dirname(__FILE__) . DS);
define('APP', PATH . 'app' . DS);
define('SYS', PATH . 'system' . DS);
define('STORAGE', PATH . 'content' . DS);
define('EXT', '.php');

require SYS . 'start' . EXT;
