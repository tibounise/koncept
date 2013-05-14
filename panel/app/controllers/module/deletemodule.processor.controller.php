<?php

$app->configureApp(LOG_PROTECTION | ERROR | MODULATOR);

if (empty($_GET['id']) === true)
{
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
}
elseif (!isset($_GET['token']) && !$app->User->checkToken($_GET['token']))
{
	$app->Error->registerMessage($app->Locales->getKey('wrongToken'));
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
		try
		{
			$app->Modulator->removeModule($_GET['id']);
			$app->Modulator->saveModuleIndex();
		}
		catch (Exception $e)
		{
			$app->Error->registerMessage($app->Locales->getKey('errorOccured').' : '.$e->getMessage());
		}
	}
}

?>