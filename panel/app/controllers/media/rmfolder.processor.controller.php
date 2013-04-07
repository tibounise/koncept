<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | MEDIATIZER | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

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