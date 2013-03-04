<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | FETCHER | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');

$app->HtmlVars->setKey('title','element');

if (!isset($_GET['token']) && !$app->User->checkToken($_GET['token'])) {
	$app->Error->registerMessage($app->Locales->getKey('wrongToken'));
} elseif (!$app->Fetcher->getElement($_GET['id'])) {
	$app->Error->registerMessage($app->Locales->getKey('idNotFound'));
} elseif (!$app->Fetcher->deleteElement($_GET['id'])) {
	$app->Error->registerMessage($app->Locales->getKey('errorOccured'));
}

?>