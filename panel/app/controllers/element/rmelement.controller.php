<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | ERROR | FETCHER);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');

$app->HtmlVars->setKey('title','element');

if (!$app->Fetcher->getElement($_GET['id']))
	$app->Error->registerMessage($app->Locales->getKey('idNotFound'));

?>