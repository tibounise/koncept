<?php

$app->configureApp(LOG_PROTECTION | ERROR | SOURCER);

$app->Sourcer->loadSourceIndex();
$sources = $app->Sourcer->listSources();

?>