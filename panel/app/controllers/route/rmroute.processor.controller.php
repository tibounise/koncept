<?php

$app->configureApp(CONFIG | LOG_PROTECTION | LOCALIZED | ROUTER | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->Router->loadRouting('../config/routes.json');

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