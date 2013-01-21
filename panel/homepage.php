<?php

require_once('init.php');

$interface = new InterfaceBuilder();
$interface->setTitle('koncept:homepage');

$interface->setContent('<h1><Localized//WelcomeAboard> !</h1>');

$interface->printLocalized($localization);

?>
