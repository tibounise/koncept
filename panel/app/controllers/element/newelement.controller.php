<?php

$app->configureApp(USER_HANDLING | CONFIG | LOG_PROTECTION | LOCALIZED);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->HtmlVars->setKey('title','element');

$metadataJSON = Kompakt\Helpers\Beautifier::JSON(json_encode(array(null)));

$timestamp = time();

?>