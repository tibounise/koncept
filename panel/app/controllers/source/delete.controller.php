<?php

$app->configureApp(LOG_PROTECTION | LOCALIZED | CONFIG | ERROR | SOURCER);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

if (empty($_GET['id']))
{
	$app->Error->registerMessage($app->Locales->getKey(''));
}
else
{
	$app->Sourcer->loadSourceIndex();

	if (!$app->Sourcer->issetSourceByIndex($_GET['id']))
	{
		$app->Error->registerMessage($app->Locales->getKey(''));
	}
	else
	{
		$app->Sourcer->
	}
}

?>