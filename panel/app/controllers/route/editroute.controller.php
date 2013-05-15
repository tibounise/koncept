<?php

$app->configureApp(LOG_PROTECTION | ROUTER | ERROR);

$app->Router->loadRouting();

$app->HtmlVars->setKey('title','router');

if (!isset($_GET['id'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (!$app->Router->issetRoute($_GET['id'])) { 
	$app->Error->registerMessage($app->Locales->getKey('routeDoesntExists'));
} else {
	$route = $app->Router->getRoute($_GET['id']);
}

?>