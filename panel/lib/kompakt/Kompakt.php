<?php

/*~-- Define the essentials constants of Kompakt --~*/
define('USER_HANDLING',1);
define('CONFIG',2);
define('FETCHER',4);
define('LOG_PROTECTION',8);
define('ERROR',16);
define('LOCALIZED',32);
define('MEDIATIZER',64);
define('ROUTER',128);

spl_autoload_register(function($class) {
	$classPath = 'lib/kompakt/'.str_replace('\\','/',$class).'.php';
	if (file_exists($classPath)) require $classPath;
});

// Define our application element
$app = new \Kompakt\Handlers\Kompakt();

?>