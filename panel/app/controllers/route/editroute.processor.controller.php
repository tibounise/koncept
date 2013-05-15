<?php

$app->configureApp(LOG_PROTECTION | ROUTER | ERROR);

$app->Router->loadRouting();

$app->HtmlVars->setKey('title','router');

if (!isset($_GET['id']) || empty($_POST['routeRegex']) || empty($_POST['routeController']))
{
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
}
elseif (!$app->Router->issetRoute($_GET['id'])) { 
	$app->Error->registerMessage($app->Locales->getKey('routeDoesntExists'));
}
else {
	$app->Router->editRoute($_GET['id'],$_POST['routeRegex'],$_POST['routeController']);
	$app->Router->saveRouting();
}

?>