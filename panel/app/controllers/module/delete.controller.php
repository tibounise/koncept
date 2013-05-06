<?php

$app->configureApp(LOG_PROTECTION | LOCALIZED | CONFIG | ERROR | MODULATOR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

if (empty($_GET['id']) === true)
{
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
}
else
{
	$app->Modulator->loadModuleIndex();

	if (!$app->Modulator->issetModuleByID($_GET['id']))
	{
		$app->Error->registerMessage($app->Locales->getKey('moduleNotFound'));
	}
	else
	{
		$module = $app->Modulator->getModuleInfo($_GET['id']);
	}
}

?>