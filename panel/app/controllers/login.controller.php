<?php

$app->configureApp(USER_HANDLING | CONFIG | ERROR | LOCALIZED);

$app->Config->pushJSON(file_get_contents('../config/admin.json'));
$app->configureLocales('locales/'.$app->Config->getKey('language').'.json');

// Verification of the login informations
if (!empty($_GET['logout']) && $_GET['logout'] == 'true' && !empty($_GET['token']) && !empty($_SESSION['token']) && $_GET['token'] == $_SESSION['token']) {
	$app->User->logout();
}

if (!empty($_POST['username']) && !empty($_POST['password'])) {
	if ($app->Config->getKey('username') == $_POST['username'] && $app->Config->getKey('password') == hash('sha256',$_POST['password'])) {
		$app->User->login($_POST['username']);
		header('Location: index.php');
	} else {
		$app->Error->registerMessage($app->Locales->getKey('badlogin'));
		sleep(10);
	}
}

?>