<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION | FETCHER | ERROR);

// Init app
$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');

// Generate a new ID
$newid = $app->Fetcher->getNewId();

// Save the element
$app->Fetcher->name = $_POST['elementName'];
$app->Fetcher->content = $_POST['elementContent'];
$app->Fetcher->metadata = json_decode(stripslashes($_POST['elementMetadata']),true);
$app->Fetcher->lastedit = $_POST['elementLastedit'];
$app->Fetcher->pubdate = $_POST['elementPubdate'];
$app->Fetcher->abilities = explode(',',$_POST['elementAbilities']);
$app->Fetcher->saveElement($newid);

// Update the index
$app->Fetcher->addIndex($newid,'element-'.$newid.'.json');
$app->Fetcher->saveIndex();

?>