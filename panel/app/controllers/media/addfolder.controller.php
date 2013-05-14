<?php

$app->configureApp(LOG_PROTECTION | MEDIATIZER);

$app->HtmlVars->setKey('title','media');

if (empty($_GET['path'])) {
	$path = '';
} else {
	$path = $_GET['path'].'/';
}

?>