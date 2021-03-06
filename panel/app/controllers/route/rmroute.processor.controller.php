<?php

$app->configureApp(LOG_PROTECTION | ROUTER | ERROR);

$app->Router->loadRouting();

$app->HtmlVars->setKey('title','router');

if (!isset($_GET['id'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (!\Kompakt\Handlers\User::checkToken($_GET['token'])) {
	$app->Error->registerMessage($app->Locales->getKey('wrongToken'));
} elseif (!$app->Router->issetRoute($_GET['id'])) { 
	$app->Error->registerMessage($app->Locales->getKey('routeDoesntExists'));
} else {
	$app->Router->removeRoute($_GET['id']);
	$app->Router->saveRouting();
}


?>