<?php

$app->configureApp(ERROR | LOCALIZED | LOG_PROTECTION | CONFIG);
$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->HtmlVars->setKey('title','settings');

?>