<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | FETCHER | ERROR);

// Init app
$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');
$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->HtmlVars->setKey('title','element');

// Generate a new ID
$newid = $app->Fetcher->getNewId();

// Save the element
$app->Fetcher->setName($_POST['elementName']);
$app->Fetcher->setContent($_POST['elementContent']);
$app->Fetcher->setMetadata(json_decode(stripslashes($_POST['elementMetadata']),true));
$app->Fetcher->saveElement($newid);

// Update the index
$app->Fetcher->addIndex($newid,'element-'.$newid.'.json');
$app->Fetcher->saveIndex();

?>