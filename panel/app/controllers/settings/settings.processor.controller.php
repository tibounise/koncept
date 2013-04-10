<?php

$app->configureApp(LOG_PROTECTION | CONFIG | LOCALIZED | ERROR);
$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->HtmlVars->setKey('title','settings');

if (empty($_POST['username']) || empty($_POST['maxMediaSize'])) {
	$app->Error->registerMessage();
} else {
	if (!empty($_POST['password'])) {
		$app->Config->setKey('password',\Kompakt\Handlers\User::hash($_POST['password']));
	}
	$app->Config->setKey('username',$_POST['username']);
	$app->Config->setKey('uploadMax',$_POST['maxMediaSize']);
	file_put_contents('../config/admin.json',$app->Config->pullJSON());
}

?>