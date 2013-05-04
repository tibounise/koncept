<?php

$app->configureApp(LOG_PROTECTION | CONFIG | LOCALIZED | ERROR | SOURCER);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->Sourcer->loadSourceIndex();
$sources = $app->Sourcer->listSources();

?>