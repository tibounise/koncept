<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION | MEDIATIZER | ERROR);

$app->HtmlVars->setKey('title','media');

if (empty($_GET['path'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (!is_dir('../media/'.$_GET['path'].'/')) {

} elseif (!isset($_GET['token']) && !$app->User->checkToken($_GET['token'])) {
	$app->Error->registerMessage($app->Locales->getKey('wrongToken'));
} else {
	$app->Mediatizer->rmdirplus('../media/'.$_GET['path'].'/');
}

?>