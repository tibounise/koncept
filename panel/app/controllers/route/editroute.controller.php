<?php

$app->configureApp(CONFIG | LOG_PROTECTION | LOCALIZED | ROUTER | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->Router->loadRouting('../config/routes.json');

$app->HtmlVars->setKey('title','router');

if (!isset($_GET['id'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (!$app->Router->issetRoute($_GET['id'])) { 
	$app->Error->registerMessage($app->Locales->getKey('routeDoesntExists'));
} else {
	$route = $app->Router->getRoute($_GET['id']);
}

?>