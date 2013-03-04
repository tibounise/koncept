<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | MEDIATIZER);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->HtmlVars->setKey('title','media');

if (empty($_GET['path'])) {
	$app->Mediatizer->setPath('../media/');
	$path = '';
} else {
	$app->Mediatizer->setPath('../media/'.$_GET['path']);
	$path = $_GET['path'].'/';
}

$files = $app->Mediatizer->listFiles();
$folders = $app->Mediatizer->listFolders();

$folders = $app->Mediatizer->cleanFolders($folders);
$files = $app->Mediatizer->cleanFiles($files);

$itemcount = count($files) + count($folders);

?>