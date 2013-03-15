<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | ROUTER | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->Router->loadRouting('../config/routes.json');

$app->HtmlVars->setKey('title','router');

if (empty($_POST['routeRegex']) || empty($_POST['routeController']) || empty($_POST['routeVariables'])) {
	$app->Error->registerMessage('BIDIOU');
} else {
	$app->Router->registerNewRoute($_POST['routeRegex'],$_POST['routeController'],explode(',',$_POST['routeVariables']));
	$app->Router->saveRouting();
}

?>