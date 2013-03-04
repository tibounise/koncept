<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->HtmlVars->setKey('title','media');

if (empty($_GET['token']) OR !$app->User->checkToken($_GET['token'])) {
	$app->Error->registerMessage($app->Locales->getKey('wrongToken'));
} elseif (empty($_POST['folderName']) || !isset($_GET['path'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (is_dir('../media/'.$_GET['path'].$_POST['folderName'])) {
	$app->Error->registerMessage($app->Locales->getKey('folderAlreadyExists'));
} else {
	mkdir('../media/'.$_GET['path'].$_POST['folderName']).'/');
}

?>