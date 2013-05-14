<?php

$app->configureApp(LOG_PROTECTION | ERROR | SOURCER);

$app->Sourcer->loadSourceIndex();

if (empty($_POST['sourceUrl']))
{
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
}
else
{
	if (substr($_POST['sourceUrl'],-1) == '/')
	{
		$url = substr($_POST['sourceUrl'],0,-1);
	}
	else
	{
		$url = $_POST['sourceUrl'];
	}

	if ($app->Sourcer->issetSourceByUrl($url))
	{
		$app->Error->registerMessage($app->Locales->getKey('sourceAlreadyExists'));
	}
	else
	{
		try
		{
			$app->Sourcer->addSource($url);
			$app->Sourcer->saveSourceIndex();
		}
		catch (Exception $e)
		{
			$app->Error->registerMessage($app->Locales->getKey('errorOccured').' : '.$e->getMessage());
		}
	}
}

?>