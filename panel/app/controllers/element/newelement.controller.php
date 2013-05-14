<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION);

$app->HtmlVars->setKey('title','element');

$metadataJSON = Kompakt\Helpers\Beautifier::JSON(json_encode(array(null)));

$timestamp = time();

?>