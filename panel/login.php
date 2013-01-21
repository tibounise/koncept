<?php

session_start();

if (isset($_SESSION['login'])) {
	header('Location: index.php');
}

require_once('class/localization.class.php');
require_once('../class/konfig.class.php');
require_once('../configuration.php');
require_once('../class/konceptdb.class.php');
require_once('class/login.class.php');

$localization = new Localization();
$localization->loadLocales($kcpt_config->getLanguage());

if (isset($_POST['form'])) {
    if (isset($_POST['username'],$_POST['password'])) {
	$koncept_db = new KonceptDB($kcpt_config->getDBSettings());
	$shaPassword = hash('sha256',$_POST['password']);
	
	if (Login::checkSA($_POST['username'], $shaPassword, $kcpt_config) || Login::checkSQL($_POST['username'],$shaPassword,$koncept_db,$kcpt_config)) {
	    $_SESSION['username'] = $_POST['username'];
	    $_SESSION['token'] = uniqid();
	    header('Location: homepage.php');
	} else {
	    sleep(5);
	    $errorTemplate = file_get_contents('assets/html/error.html');
	    $errorHtml = str_replace('<String//ErrorMessage>','<Localized//WrongID>', $errorTemplate);
	    echo $localization->ssParser($errorHtml);
	}
    } else {
	$errorTemplate = file_get_contents('assets/html/error.html');
	$errorHtml = str_replace('<String//ErrorMessage>','<Localized//FieldsNotFilled>', $errorTemplate);
	echo $localization->ssParser($errorHtml);
    }
} else {
    echo $localization->ssParser(file_get_contents('assets/html/login.html'));
}

?>
