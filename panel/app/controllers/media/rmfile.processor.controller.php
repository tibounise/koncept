<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->HtmlVars->setKey('title','media');

if (empty($_GET['path'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (!file_exists('../media/'.$_GET['path']) OR !is_file('../media/'.$_GET['path'])) {
	$app->Error->registerMessage($app->Locales->getKey('fileDoesntExists'));
} else {
	unlink('../media/'.$_GET['path']);
}

?>