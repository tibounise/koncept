<?php

$app->configureApp(CONFIG | LOG_PROTECTION | LOCALIZED | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->HtmlVars->setKey('title','router');

$routes = json_decode(file_get_contents('../config/routes.json'));

if ($routes != null OR count($routes) > 1) {
	$showRoutes = true;
} else {
	$showRoutes = false;
}

?>