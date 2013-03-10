<?php

$app->configureApp(CONFIG | LOG_PROTECTION | LOCALIZED | FETCHER | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');

$app->HtmlVars->setKey('title','element');

if (!$app->Fetcher->getElement($_GET['id'])) {
	$app->Error->registerMessage($app->Locales->getKey('idNotFound'));
} else {
	$metadata = $app->Fetcher->metadata;
	$app->Fetcher->lastedit = time();
	$metadataJSON = Kompakt\Helpers\Beautifier::JSON(json_encode($metadata));
	$abilities = implode(',',$app->Fetcher->abilities);
}

?>