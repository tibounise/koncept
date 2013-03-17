<?php

$app->configureApp(CONFIG | LOG_PROTECTION | LOCALIZED | ROUTER | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->Router->loadRouting('../config/routes.json');

$app->HtmlVars->setKey('title','router');

if (!isset($_GET['id']) || empty($_POST['routeRegex']) || empty($_POST['routeController']) || empty($_POST['routeVariables'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (!$app->Router->issetRoute($_GET['id'])) { 
	$app->Error->registerMessage($app->Locales->getKey('routeDoesntExists'));
} else {
	$app->Router->editRoute($_GET['id'],$_POST['routeRegex'],$_POST['routeController'],explode(',',$_POST['routeVariables']));
	$app->Router->saveRouting();
}

?>