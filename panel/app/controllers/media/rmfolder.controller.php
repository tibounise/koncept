<?php

$app->configureApp(CONFIG | LOG_PROTECTION | LOCALIZED | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->HtmlVars->setKey('title','media');

if (empty($_GET['path'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} elseif (!is_dir('../media/'.$_GET['path'].'/')) {
	$app->Error->registerMessage($app->Locales->getKey('folderDoesntExists'));
} else {
	$pathPieces = explode('/',$_GET['path']);
	$pathPieces = array_reverse($pathPieces);
	$pathPieces = array_pop($pathPieces);
	if (is_array($pathPieces)) {
		$path = implode('/',$pathPieces);
	} else {
		$path = $pathPieces;
	}
}

?>