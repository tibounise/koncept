<?php

$app->configureApp(LOG_PROTECTION | LOCALIZED | CONFIG | ERROR | SOURCER | USER | MODULATOR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

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
	$app->Sourcer->loadSourceIndex();

	if (!$app->Sourcer->issetPackageByID($_GET['id']))
	{
		$app->Error->registerMessage($app->Locales->getKey('packageNotFound'));
	}
	else
	{
		try
		{
			// Downloading the package
			$app->Sourcer->downloadPackage($_GET['id']);

			$app->Modulator->loadModuleIndex();
			$app->Modulator->install('tmp/package.kcpt');
			$app->Modulator->saveModuleIndex();
		}
		catch (Exception $e)
		{
			$app->Error->registerMessage($app->Locales->getKey('errorOccured').' : '.$e->getMessage());
		}
	}
}

?>