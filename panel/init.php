<?php

session_start();
session_regenerate_id();

if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

require_once('class/localization.class.php');
require_once('class/InterfaceBuilder.php');
require_once('../class/konfig.class.php');
require_once('../class/konceptdb.class.php');
require_once('../configuration.php');

$localization = new Localization();
$localization->loadLocales($kcpt_config->getLanguage());

?>