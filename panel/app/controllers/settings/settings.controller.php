<?php

$app->configureApp(LOCALIZED | LOG_PROTECTION | CONFIG);
$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

?>