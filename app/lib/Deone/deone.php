<?php

spl_autoload_register(function($class) {
	$classPath = 'app/lib/Deone/'.str_replace('\\','/',$class).'.php';
	if (file_exists($classPath)) require $classPath;
});

// Define our application element
$app = new \Deone\Handlers\Deone;

// Providing a shortcut to $app
$a = &$app;

?>