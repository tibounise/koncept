<?php

$app->configureApp(FETCHER | CONFIG);

$app->Config->pushJSON(file_get_contents('config/main.json'));

$app->Fetcher->openIndex('data/index.json');
$app->Fetcher->registerPath('data/');
$app->Fetcher->getElement($app->Config->getKey('index'));

?>