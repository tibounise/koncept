<?php

$app->configureApp(LOG_PROTECTION | ERROR | MODULATOR);

$app->Modulator->loadModuleIndex();

$moduleList = $app->Modulator->fullListModules();

?>