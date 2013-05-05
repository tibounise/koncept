<?php

$app->configureApp(LOG_PROTECTION | LOCALIZED | CONFIG | ERROR | SOURCER);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

if (empty($_GET['id']) === false)
{
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
}
else
{
	$app->Sourcer->loadSourceIndex();

	if (!$app->Sourcer->issetSourceByIndex($_GET['id']))
	{
		$app->Error->registerMessage($app->Locales->getKey('sourceNotFound'));
	}
	else
	{
		try
		{
			$app->Sourcer->deleteSource($_GET['id']);
			$app->Sourcer->saveSourceIndex();

		}
		catch (Exception $e)
		{
			$app->Error->registerMessage($app->Locales->getKey('errorOccured').' : '.$e->getMessage());
		}
	}
}

?>