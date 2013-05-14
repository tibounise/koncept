<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION | ERROR);

$app->HtmlVars->setKey('title','media');

if (empty($_GET['token']) OR !$app->User->checkToken($_GET['token'])) {
	$app->Error->registerMessage($app->Locales->getKey('wrongToken'));
} elseif (empty($_POST['folderName']) || !isset($_GET['path'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (is_dir('../media/'.$_GET['path'].$_POST['folderName'])) {
	$app->Error->registerMessage($app->Locales->getKey('folderAlreadyExists'));
} else {
	mkdir('../media/'.$_GET['path'].$_POST['folderName'].'/');
}

?>