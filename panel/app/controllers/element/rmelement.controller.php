<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION | ERROR | FETCHER);

$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');

$app->HtmlVars->setKey('title','element');

if (!$app->Fetcher->getElement($_GET['id']))
	$app->Error->registerMessage($app->Locales->getKey('idNotFound'));

?>