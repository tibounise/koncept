<?php 

$app->configureApp(CONFIG | LOG_PROTECTION | LOCALIZED | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->HtmlVars->setKey('title','backup');

if (empty($_POST['mediaBackup']) || empty($_POST['elementBackup'])) {
	$app->Error->registerMessage($app->Locales->getKey('missingFieldsOrEmpty'));
} else {
	if ($_POST['mediaBackup'] == 'false' && $_POST['elementBackup'] == 'false') {
		$app->Error->registerMessage($app->Locales->getKey('nothingToBackup'));
	} else {
		$backupPath = 'tmp/backup.zip';

		$zipHandler = new \ZipArchive();
		$zipHandler->open($backupPath, \ZIPARCHIVE::CREATE);

		// Deleting remainings files
		$filesToCheck = array($backupPath,'tmp/media.zip','tmp/elements.zip','tmp/config.zip');
		foreach ($filesToCheck as $file) {
			if (file_exists($file))
				unlink($file);
		}
	
		if ($_POST['mediaBackup'] == 'true') {
			\Kompakt\Helpers\Archiver::ZipMaker('../media/','tmp/media.zip');
			$zipHandler->addFromString('media.zip', file_get_contents('tmp/media.zip'));
			unlink('tmp/media.zip');
		}
		if ($_POST['elementBackup'] == 'true') {
			\Kompakt\Helpers\Archiver::ZipMaker('../data/','tmp/elements.zip');
			$zipHandler->addFromString('elements.zip', file_get_contents('tmp/elements.zip'));
			unlink('tmp/elements.zip');
		}
		/* if ($_POST['configBackup'] == 'true') {
			\Kompakt\Helpers\Archiver::ZipMaker('../config/','tmp/config.zip');
			$zipHandler->addFromString('config.zip',file_get_contents('tmp/config.zip'));
			unlink('tmp/config.zip');
		} */

		$zipHandler->close();
	}
}

?>