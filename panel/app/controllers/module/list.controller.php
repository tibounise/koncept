<?php

$app->configureApp(CONFIG | LOG_PROTECTION | LOCALIZED | ERROR | MODULATOR);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

$app->Modulator->loadModuleIndex();

$moduleList = $app->Modulator->fullListModules();

?>