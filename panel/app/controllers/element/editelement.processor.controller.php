<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | FETCHER | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');

$app->HtmlVars->setKey('title','element');

if (empty($_POST['elementName']) || empty($_POST['elementContent']) || empty($_POST['elementMetadata']) || empty($_POST['elementLastedit']) || empty($_POST['elementPubdate'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (!isset($_GET['token']) && !$app->User->checkToken($_GET['token'])) {
	$app->Error->registerMessage($app->Locales->getKey('wrongToken'));
} elseif (!$app->Fetcher->getElement($_GET['id'])) {
	$app->Error->registerMessage($app->Locales->getKey('idNotFound'));
} else {
	$app->Fetcher->name = $_POST['elementName'];
	$app->Fetcher->content = $_POST['elementContent'];
	$app->Fetcher->metadata = json_decode(stripslashes($_POST['elementMetadata']),true);
	$app->Fetcher->lastedit = $_POST['elementLastedit'];
	$app->Fetcher->pubdate = $_POST['elementPubdate'];
	$app->Fetcher->saveElement($_GET['id']);
}

?>