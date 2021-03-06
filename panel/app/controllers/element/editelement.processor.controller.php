<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION | FETCHER | ERROR);

$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');

$app->HtmlVars->setKey('title','element');

if (empty($_POST['elementName']) || empty($_POST['elementContent']) || empty($_POST['elementMetadata']) || empty($_POST['elementLastedit']) || empty($_POST['elementPubdate'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (!isset($_POST['token']) && !$app->User->checkToken($_GET['token'])) {
	$app->Error->registerMessage($app->Locales->getKey('wrongToken'));
} elseif (!$app->Fetcher->getElement($_POST['id'])) {
	$app->Error->registerMessage($app->Locales->getKey('idNotFound'));
} else {
	$app->Fetcher->name = $_POST['elementName'];
	$app->Fetcher->content = $_POST['elementContent'];
	$app->Fetcher->metadata = json_decode(stripslashes($_POST['elementMetadata']),true);
	$app->Fetcher->lastedit = $_POST['elementLastedit'];
	$app->Fetcher->pubdate = $_POST['elementPubdate'];
	$app->Fetcher->saveElement($_POST['id']);
}

?>