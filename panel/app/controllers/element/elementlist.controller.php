<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION | FETCHER);

$app->Fetcher->openIndex('../data/index.json');
$app->Fetcher->registerPath('../data/');

$app->HtmlVars->setKey('title','element');

$index = json_decode(file_get_contents('../data/index.json'),true);

?>