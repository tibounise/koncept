<?php

require_once('init.php');

$interface = new InterfaceBuilder();
$interface->setTitle('koncept:backup');

$interface->setContent('<h1><Localized//Backup></h1><hr>');

$form = new FormBuilder();

$interface->appendContent('');

$interface->printLocalized($localization);

?>
