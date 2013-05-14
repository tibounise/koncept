<?php

$app->configureApp(LOG_PROTECTION | ERROR);

if (empty($_POST['username']) || empty($_POST['maxMediaSize']))
{
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
}
else
{
	if (!empty($_POST['password']))
	{
		$app->Config->setKey('password',\Kompakt\Handlers\User::hash($_POST['password']));
	}

	$app->Config->setKey('username',$_POST['username']);
	$app->Config->setKey('uploadMax',$_POST['maxMediaSize']);
	file_put_contents('../config/admin.json',$app->Config->pullJSON());
}

?>