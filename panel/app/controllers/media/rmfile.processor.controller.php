<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION | ERROR);

$app->HtmlVars->setKey('title','media');

if (empty($_GET['path'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (!file_exists('../media/'.$_GET['path']) OR !is_file('../media/'.$_GET['path'])) {
	$app->Error->registerMessage($app->Locales->getKey('fileDoesntExists'));
} else {
	unlink('../media/'.$_GET['path']);
}

?>