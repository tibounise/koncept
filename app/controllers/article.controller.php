<?php

$app->configureApp(FETCHER | CONFIG);

$app->Config->pushJSON(file_get_contents('config/main.json'));

$app->Fetcher->openIndex('data/index.json');
$app->Fetcher->registerPath('data/');

if (empty($_GET['id']) OR !is_integer($_GET['id'])) {
	header('Location: 400');
} elseif (!$app->Fetcher->getElement($_GET['id']) OR !$app->Fetcher->hasAbility('article')) {
	header('Location: 404');
}

?>