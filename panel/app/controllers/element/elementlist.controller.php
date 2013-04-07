<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED | FETCHER);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');
$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');

$app->HtmlVars->setKey('title','element');

$index = json_decode(file_get_contents('../data/index.json'),true);

?>