<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | FETCHER | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');

$app->HtmlVars->setKey('title','element');

if (!$app->Fetcher->getElement($_GET['id'])) {
	$app->Error->registerMessage($app->Locales->getKey('idNotFound'));
} else {
	$metadata = $app->Fetcher->getMetadata();
	$metadata['editdate'] = time();
	$metadataJSON = Kompakt\Helpers\Beautifier::JSON(json_encode($metadata));
}

?>