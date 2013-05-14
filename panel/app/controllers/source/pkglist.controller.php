<?php

$app->configureApp(LOG_PROTECTION | ERROR | SOURCER);

$app->Sourcer->loadSourceIndex();
$packages = $app->Sourcer->listPackages();

?>