<?php

$app->configureApp(LOG_PROTECTION | ERROR | SOURCER | USER);

if (empty($_GET['id']) === false)
{
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
}
elseif (!isset($_GET['token']) && !$app->User->checkToken($_GET['token']))
{
	$app->Error->registerMessage($app->Locales->getKey('wrongToken'));
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