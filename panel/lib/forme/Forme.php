<?php

spl_autoload_register(function($class) {
	$classPath = 'lib/forme/'.str_replace('\\','/',$class).'.php';
	if (file_exists($classPath)) require $classPath;
});

?>