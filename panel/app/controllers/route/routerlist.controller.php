<?php

$app->configureApp(LOG_PROTECTION | ERROR);

$app->HtmlVars->setKey('title','router');

$routes = json_decode(file_get_contents('../config/routes.json'));

if ($routes != null OR count($routes) > 1) {
	$showRoutes = true;
} else {
	$showRoutes = false;
}

?>