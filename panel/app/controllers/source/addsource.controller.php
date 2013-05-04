<?php

$app->configureApp(LOG_PROTECTION | CONFIG | LOCALIZED | ERROR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

?>