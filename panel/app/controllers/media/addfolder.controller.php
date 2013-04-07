<?php

$app->configureApp(CONFIG | LOG_PROTECTION | LOCALIZED | MEDIATIZER);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->HtmlVars->setKey('title','media');

if (empty($_GET['path'])) {
	$path = '';
} else {
	$path = $_GET['path'].'/';
}

?>