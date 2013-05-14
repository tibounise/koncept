<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION | MEDIATIZER | ERROR);

$app->HtmlVars->setKey('title','media');

$app->Mediatizer->setPath('../media/');
$files = $app->Mediatizer->listFiles();

if (!isset($_FILES['mediaFile'])) {
	$app->Error->registerMessage('noFile');
} elseif ($_FILES['mediaFile']['size'] > $app->Config->getKey('uploadMax')*pow(1024,2)) {
	$app->Error->registerMessage($app->Locales->getKey('wrongFilesize'));
} elseif ($_FILES['mediaFile']['name'] == '.htaccess') {
	$app->Error->registerMessage($app->Locales->getKey('wrongFilename'));
} elseif ($_FILES['mediaFile']['error'] != 0) {
	if ($_FILES['mediaFile']['error'] == UPLOAD_ERR_INI_SIZE || $_FILES['mediaFile']['error'] == UPLOAD_ERR_NO_TMP_DIR || $_FILES['mediaFile']['error'] == UPLOAD_ERR_EXTENSION) {
		$app->Error->registerMessage($app->Locales->getKey('phpConfigError'));
	} elseif ($_FILES['mediaFile']['error'] == UPLOAD_ERR_FORM_SIZE) {
		$app->Error->registerMessage($app->Locales->getKey('wrongFilesize'));
	} elseif ($_FILES['mediaFile']['error'] == UPLOAD_ERR_NO_FILE || $_FILES['mediaFile']['error'] == UPLOAD_ERR_PARTIAL) {
		$app->Error->registerMessage($app->Locales->getKey('errorWhileUpload'));
	} else {
		$app->Error->registerMessage($app->Locales->getKey('unknownError'));
	}
} elseif (in_array($_FILES['mediaFile']['name'],$files)) {
	$app->Error->registerMessage($app->Locales->getKey('fileWithSameName'));
} else {
	if (!move_uploaded_file($_FILES['mediaFile']['tmp_name'],'../media/'.$_FILES['mediaFile']['name'])) {
		$app->Error->registerMessage($app->Locales->getKey('errorWhileUpload'));
	}
}

?>