<?php

$app->configureApp(LOG_PROTECTION | ERROR | MODULATOR);

if (!isset($_FILES['moduleFile']))
{
	$app->Error->registerMessage('noFile');
}
elseif ($_FILES['moduleFile']['name'] == '.htaccess')
{
	$app->Error->registerMessage($app->Locales->getKey('wrongFilename'));
}
elseif ($_FILES['moduleFile']['error'] != 0)
{
	if ($_FILES['moduleFile']['error'] == UPLOAD_ERR_INI_SIZE || $_FILES['moduleFile']['error'] == UPLOAD_ERR_NO_TMP_DIR || $_FILES['moduleFile']['error'] == UPLOAD_ERR_EXTENSION)
	{
		$app->Error->registerMessage($app->Locales->getKey('phpConfigError'));
	}
	elseif ($_FILES['moduleFile']['error'] == UPLOAD_ERR_FORM_SIZE)
	{
		$app->Error->registerMessage($app->Locales->getKey('wrongFilesize'));
	}
	elseif ($_FILES['moduleFile']['error'] == UPLOAD_ERR_NO_FILE || $_FILES['moduleFile']['error'] == UPLOAD_ERR_PARTIAL)
	{
		$app->Error->registerMessage($app->Locales->getKey('errorWhileUpload'));
	}
	else
	{
		$app->Error->registerMessage($app->Locales->getKey('unknownError'));
	}
}
else
{
	if (!move_uploaded_file($_FILES['moduleFile']['tmp_name'],'tmp/'.$_FILES['moduleFile']['name']))
	{
		$app->Error->registerMessage($app->Locales->getKey('errorWhileUpload'));
	}
	else
	{
		$app->Modulator->loadModuleIndex();
		try
		{
			$app->Modulator->install('tmp/'.$_FILES['moduleFile']['name']);
			$app->Modulator->saveModuleIndex();
		}
		catch (Exception $e)
		{
			$app->Error->registerMessage($app->Locales->getKey('errorOccured').' : '.$e->getMessage());
		}
	}
}

?>