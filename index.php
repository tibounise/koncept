<?php

require 'app/lib/Deone/deone.php';

// Gathering the url and passing it into the router
if ($app->Router->getRoute($app->Router->rawUrl()) !== null)
{
	require $app->Router->getRoute($app->Router->rawUrl());
}
elseif ($app->Router->getRoute(404) !== null)
{
	require $app->Router->getRoute(404);
}
else
{
	die('404 ERROR');
}

?>