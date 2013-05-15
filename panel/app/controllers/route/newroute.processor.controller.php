<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION | ROUTER | ERROR);

$app->Router->loadRouting();

$app->HtmlVars->setKey('title','router');

if (empty($_POST['routeRegex']) || empty($_POST['routeController'])) {
	$app->Error->registerMessage('missingFieldsOrEmpty');
} else {
	$app->Router->registerNewRoute($_POST['routeRegex'],$_POST['routeController']);
	$app->Router->saveRouting();
}

?>